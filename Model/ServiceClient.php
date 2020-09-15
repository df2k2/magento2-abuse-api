<?php
/**
 * Copyright 2020 (c) Chris Snedaker, All rights reserved.
 */

declare(strict_types=1);

namespace Cs\AbuseApi\Model;

use Cs\AbuseApi\Model\Client\ClientFactory;
use \GuzzleHttp\Client as GuzzleClient;
use \GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use Magento\Framework\Serialize\Serializer\Json;
use Cs\AbuseApi\Model\Client\CheckResponse;
use Cs\AbuseApi\Model\Client\CheckResponseFactory;
use Magento\Framework\Data\CollectionFactory;
use Magento\Framework\Data\Collection;

/**
 * Class ServiceClient
 *
 * @package Cs\AbuseApi\Model
 */
class ServiceClient
{

    public const API_ENDPOINT_CHECK = 'check';
    public const API_ENDPOINT_REPORT = 'report';

    private $checkResponseFactory;
    private $serializer;
    private $collectionFactory;
    private $collection;

    /** @var Config $config */
    private $config;

    /** @var GuzzleClient $client */
    private $client;

    /** @var array $headers */
    private $headers = [];

    /**
     * ServiceClient constructor.
     *
     * @param Config        $config
     * @param ClientFactory $clientFactory
     */
    public function __construct(
        Config $config,
        ClientFactory $clientFactory,
        CheckResponseFactory $checkResponseFactory,
        Json $serializer,
        CollectionFactory $collectionFactory,
    Collection $collection
    ) {
        $this->config = $config;
        $this->serializer = $serializer;
        $this->checkResponseFactory = $checkResponseFactory;
        $this->collectionFactory = $collectionFactory;
        $this->collection = $collection;
        $this->client = $clientFactory->create([
            'base_uri' => $this->getBaseUri()
        ]);
    }

    /**
     * @return string
     */
    public function getBaseUri()
    {
        return $this->config->getBaseUri();
    }

    /**
     * A generic method for passing through calls to SaaS
     *
     * @param string $method
     * @param string $url
     * @param array  $payload
     *
     * @return array
     */

    public function request(string $method, string $url, $payload): array
    {
        try {
            $result = $this->client->request($method, $url, ['headers' => $this->getHeaders(), 'query' => $payload]);
        } catch (GuzzleException $e) {
            //All 4xx and 5xx http codes are handled properly. Transport exceptions are forwarded to 400
            return [
                'code' => '400',
                'body' => $e->getMessage()
            ];
        }

        return $this->getClientData($result);
    }

    /**
     * Get client data with status and body
     *
     * @param $result
     *
     * @return array
     */
    private function getClientData($result): array
    {
        return [
            'code' => $result->getStatusCode(),
            'body' => $result->getBody()->getContents()
        ];
    }

    /**
     * @param      $headerKey
     * @param null $headerValue
     *
     * @return $this
     */
    public function setHeader($headerKey, $headerValue = null): self
    {
        if (is_array($headerKey)) {
            foreach ($headerKey as $key => $value) {
                $this->headers[$key] = $value;
            }
        } else {
            $this->headers[$headerKey] = $headerValue;
        }

        return $this;
    }

    /**
     * @param array $header
     *
     * @return $this
     */
    public function addHeader(array $header = [])
    {
        $this->headers = array_merge($this->headers, $header);

        return $this;
    }

    /**
     * @param string $ip
     *
     */
    public function checkIp(string $ip, int $numDays = null)
    {
        $payload = [
            'ipAddress'    => $ip,
            'maxAgeInDays' => $numDays ?: $this->config->getMaxDays()
        ];

        $response = $this->request('GET', self::API_ENDPOINT_CHECK, $payload);
        if ($response['code'] === 200) {
            $data = $this->serializer->unserialize($response['body']);
            $data['error'] = false;
            $data['code'] = $response['code'];
        } else {
            $data = [
                'error'   => true,
                'message' => $response['body'],
                'code'    => $response['code']
            ];
        }

        return $this->checkResponseFactory->create($data);
    }

    public function checkIps(array $ips, int $numdays = null)
    {
        foreach ($ips as $ip) {
            if ($d = $this->checkIp($ip, $numdays)) {
                if (!$d->getError()) {
                    $this->collection->addItem($d);
                }
            }
        }

        return $this->collection;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return array_merge($this->headers, [
            'Accept' => 'application/json',
            'Key'    => $this->config->getApiKey()
        ]);
    }
}

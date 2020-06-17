<?php
/**
 * Copyright 2020 (c) Chris Snedaker, All rights reserved.
 */

declare(strict_types=1);

namespace Cs\AbuseApi\Model;

use Cs\AbuseApi\Model\Client\ClientFactory;
use \GuzzleHttp\Client as GuzzleClient;
use \GuzzleHttp\Exception\ClientException;

/**
 * Class ServiceClient
 *
 * @package Cs\AbuseApi\Model
 */
class ServiceClient
{

    public const API_ENDPOINT_CHECK = 'check';
    public const API_ENDPOINT_REPORT = 'report';

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
        ClientFactory $clientFactory
    ) {
        $this->config = $config;
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
        } catch (ClientException $e) {
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
     * @return array
     */
    public function checkIp(string $ip)
    {
        $payload = [

            'ipAddress'    => $ip,
            'maxAgeInDays' => $this->config->getMaxDays()

        ];

        return $this->request('GET', self::API_ENDPOINT_CHECK, $payload);
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

<?php
/**
 * Copyright 2020 (c) Chris Snedaker, All rights reserved.
 */

declare(strict_types=1);

namespace Cs\AbuseApi\Model\Client;

use GuzzleHttp\Client;
use Magento\Framework\ObjectManagerInterface;

/**
 * Factory for the \GuzzleHttp\Client object creation
 */
class ClientFactory
{

    /**
     * Object Manager instance
     *
     * @var ObjectManagerInterface
     */
    private $objectManager;

    /**
     * Instance name to create
     *
     * @var string
     */
    private $instanceName;

    /**
     * @param ObjectManagerInterface $objectManager
     * @param string                 $instanceName
     */
    public function __construct(
        ObjectManagerInterface $objectManager,
        $instanceName = \GuzzleHttp\Client::class
    ) {
        $this->objectManager = $objectManager;
        $this->instanceName = $instanceName;
    }

    /**
     * Create class instance with specified parameters
     *
     * @param array $data
     *
     * @return Client
     */
    public function create(array $data = []): Client
    {
        return $this->objectManager->create($this->instanceName, ['config' => $data]);
    }

}


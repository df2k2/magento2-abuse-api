<?php
/**
 * Copyright 2020 (c) Chris Snedaker, All rights reserved.
 */

declare(strict_types=1);

namespace Cs\AbuseApi\Model;

use Cs\AbuseApi\Api\ConfigInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\UrlInterface;
use Magento\Store\Model\ScopeInterface;

/**
 * Configuration Settings Class
 */
class Config implements ConfigInterface
{

    public const XML_PATH_ROOT = 'abuse/';
    public const XML_PATH_GENERAL = 'abuse/general/';
    public const XML_PATH_ENABLED = 'abuse/general/enabled';

    /** @var ScopeConfigInterface $scopeConfig */
    private $scopeConfig;

    /**
     * Config constructor.
     *
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * Get config setting value
     *
     * @param string $path
     * @param null   $storeId
     *
     * @return mixed
     */
    public function get(string $path, $storeId = null)
    {

        return $this->scopeConfig->getValue(
            $path,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }

    /**
     * Simplified method to get configuration value
     *
     * @param string $field
     * @param null   $storeId
     *
     * @return mixed
     */
    public function getConfigValue(string $field, $storeId = null)
    {
        return $this->get(self::XML_PATH_GENERAL . $field, $storeId);
    }

    /**
     * Determines how far back in time we go to fetch reports from Api
     *
     * @param null $storeId
     *
     * @return int
     */
    public function getMaxDays($storeId = null): int
    {
        return (int) $this->getConfigValue('max_days', $storeId);
    }

    /**
     * Get base uri configuration setting
     *
     * @param null $storeId
     *
     * @return string
     */
    public function getBaseUri($storeId = null): string
    {
        return $this->getConfigValue('base_uri', $storeId);
    }

    /**
     * Get api key configuration setting
     *
     * @param null $storeId
     *
     * @return string
     */
    public function getApiKey($storeId = null): string
    {
        return $this->getConfigValue('api_key', $storeId);
    }

    /**
     * Get all config data as array
     *
     * @param null $storeId
     *
     * @return array
     */
    public function getConfigData($storeId = null): array
    {
        return [
            'base_uri' => $this->getBaseUri($storeId),
            'api_key'  => $this->getApiKey($storeId),
            'max_days' => $this->getMaxDays($storeId),
        ];
    }

    /**
     * Is module enabled
     *
     * @param null $storeId
     *
     * @return bool
     */
    public function isEnabled($storeId = null): bool
    {
        return (bool) $this->get(self::XML_PATH_ENABLED, $storeId);
    }
}

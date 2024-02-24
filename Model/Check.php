<?php
/**
 * Copyright © Copyright 2024 (c) Chris Snedaker.  All Rights Reserved. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Cs\AbuseApi\Model;

use Cs\AbuseApi\Api\Data\CheckInterface;
use Magento\Framework\Model\AbstractModel;

class Check extends AbstractModel implements CheckInterface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\Cs\AbuseApi\Model\ResourceModel\Check::class);
    }

    /**
     * @inheritDoc
     */
    public function getCheckId()
    {
        return $this->getData(self::CHECK_ID);
    }

    /**
     * @inheritDoc
     */
    public function setCheckId($checkId)
    {
        return $this->setData(self::CHECK_ID, $checkId);
    }

    /**
     * @inheritDoc
     */
    public function getIpAddress()
    {
        return $this->getData(self::IP_ADDRESS);
    }

    /**
     * @inheritDoc
     */
    public function setIpAddress($ipAddress)
    {
        return $this->setData(self::IP_ADDRESS, $ipAddress);
    }

    /**
     * @inheritDoc
     */
    public function getIsPublic()
    {
        return $this->getData(self::IS_PUBLIC);
    }

    /**
     * @inheritDoc
     */
    public function setIsPublic($isPublic)
    {
        return $this->setData(self::IS_PUBLIC, $isPublic);
    }

    /**
     * @inheritDoc
     */
    public function getIpVersion()
    {
        return $this->getData(self::IP_VERSION);
    }

    /**
     * @inheritDoc
     */
    public function setIpVersion($ipVersion)
    {
        return $this->setData(self::IP_VERSION, $ipVersion);
    }

    /**
     * @inheritDoc
     */
    public function getAbuseConfidenceScore()
    {
        return $this->getData(self::ABUSE_CONFIDENCE_SCORE);
    }

    /**
     * @inheritDoc
     */
    public function setAbuseConfidenceScore($abuseConfidenceScore)
    {
        return $this->setData(self::ABUSE_CONFIDENCE_SCORE, $abuseConfidenceScore);
    }

    /**
     * @inheritDoc
     */
    public function getCountryCode()
    {
        return $this->getData(self::COUNTRY_CODE);
    }

    /**
     * @inheritDoc
     */
    public function setCountryCode($countryCode)
    {
        return $this->setData(self::COUNTRY_CODE, $countryCode);
    }

    /**
     * @inheritDoc
     */
    public function getIsWhitelisted()
    {
        return $this->getData(self::IS_WHITELISTED);
    }

    /**
     * @inheritDoc
     */
    public function setIsWhitelisted($isWhitelisted)
    {
        return $this->setData(self::IS_WHITELISTED, $isWhitelisted);
    }

    /**
     * @inheritDoc
     */
    public function getUsageType()
    {
        return $this->getData(self::USAGE_TYPE);
    }

    /**
     * @inheritDoc
     */
    public function setUsageType($usageType)
    {
        return $this->setData(self::USAGE_TYPE, $usageType);
    }

    /**
     * @inheritDoc
     */
    public function getIsp()
    {
        return $this->getData(self::ISP);
    }

    /**
     * @inheritDoc
     */
    public function setIsp($isp)
    {
        return $this->setData(self::ISP, $isp);
    }

    /**
     * @inheritDoc
     */
    public function getDomain()
    {
        return $this->getData(self::DOMAIN);
    }

    /**
     * @inheritDoc
     */
    public function setDomain($domain)
    {
        return $this->setData(self::DOMAIN, $domain);
    }

    /**
     * @inheritDoc
     */
    public function getTotalReports()
    {
        return $this->getData(self::TOTAL_REPORTS);
    }

    /**
     * @inheritDoc
     */
    public function setTotalReports($totalReports)
    {
        return $this->setData(self::TOTAL_REPORTS, $totalReports);
    }

    /**
     * @inheritDoc
     */
    public function getNumDistinctUsers()
    {
        return $this->getData(self::NUM_DISTINCT_USERS);
    }

    /**
     * @inheritDoc
     */
    public function setNumDistinctUsers($numDistinctUsers)
    {
        return $this->setData(self::NUM_DISTINCT_USERS, $numDistinctUsers);
    }

    /**
     * @inheritDoc
     */
    public function getLastReportedAt()
    {
        return $this->getData(self::LAST_REPORTED_AT);
    }

    /**
     * @inheritDoc
     */
    public function setLastReportedAt($lastReportedAt)
    {
        return $this->setData(self::LAST_REPORTED_AT, $lastReportedAt);
    }

    /**
     * @inheritDoc
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * @inheritDoc
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }

    /**
     * @inheritDoc
     */
    public function getUpdatedAt()
    {
        return $this->getData(self::UPDATED_AT);
    }

    /**
     * @inheritDoc
     */
    public function setUpdatedAt($updatedAt)
    {
        return $this->setData(self::UPDATED_AT, $updatedAt);
    }

    /**
     * @inheritDoc
     */
    public function getCheckDays()
    {
        return $this->getData(self::CHECK_DAYS);
    }

    /**
     * @inheritDoc
     */
    public function setCheckDays($checkDays)
    {
        return $this->setData(self::CHECK_DAYS, $checkDays);
    }

    /**
     * @inheritDoc
     */
    public function getHostnames(): ?array
    {
        return explode(',',$this->getData(self::HOSTNAMES));
    }

    /**
     * @inheritDoc
     */
    public function setHostnames(array $hostnames)
    {
        return $this->setData(self::HOSTNAMES, implode(',',$hostnames));
    }

    /**
     * @inheritDoc
     */
    public function getIsTor()
    {
        return $this->getData(self::IS_TOR);
    }

    /**
     * @inheritDoc
     */
    public function setIsTor($isTor)
    {
        return $this->setData(self::IS_TOR, $isTor);
    }
}


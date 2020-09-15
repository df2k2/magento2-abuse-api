<?php

/**
 * Copyright 2020 (c) Chris Snedaker, All rights reserved.
 */

declare(strict_types=1);

namespace Cs\AbuseApi\Model\Client;

use Cs\AbuseApi\Api\Data\CheckResponseInterface;
use Magento\Framework\DataObject;

class CheckResponse extends DataObject implements CheckResponseInterface
{
    /**
     * CheckResponse constructor.
     *
     * @param array $data
     */
    public function __construct(
        array $data = []
    ) {
        parent::__construct($data);
    }

    /**
     * @inheritDoc
     */
    public function getIpAddress(): string
    {
        return $this->getData(self::IP_ADDRESS);
    }

    /**
     * @inheritDoc
     */
    public function getIsPublic(): bool
    {
        return $this->getData(self::IS_PUBLIC);
    }

    /**
     * @inheritDoc
     */
    public function getIpVersion(): int
    {
        return $this->getData(self::IP_VERSION);
    }

    /**
     * @inheritDoc
     */
    public function getIsWhitelisted(): bool
    {
        return $this->getData(self::IS_WHITELISTED);
    }

    /**
     * @inheritDoc
     */
    public function getAbuseConfidenceScore(): int
    {
        return $this->getData(self::ABUSE_CONFIDENCE_SCORE);
    }

    /**
     * @inheritDoc
     */
    public function getCountryCode(): string
    {
        return $this->getData(self::COUNTRY_CODE);
    }

    /**
     * @inheritDoc
     */
    public function getUsageType(): string
    {
        return $this->getData(self::USAGE_TYPE);
    }

    /**
     * @inheritDoc
     */
    public function getIsp(): string
    {
        return $this->getData(self::ISP);
    }

    /**
     * @inheritDoc
     */
    public function getDomain(): string
    {
        return $this->getData(self::DOMAIN);
    }

    /**
     * @inheritDoc
     */
    public function getHostnames(): array
    {
        return $this->getData(self::HOSTNAMES);
    }

    /**
     * @inheritDoc
     */
    public function getTotalReports(): int
    {
        return $this->getData(self::TOTAL_REPORTS);
    }

    /**
     * @inheritDoc
     */
    public function getNumDistinctUsers(): int
    {
        return $this->getData(self::NUM_DISTINCT_USERS);
    }

    /**
     * @inheritDoc
     */
    public function getLastReportedAt(): string
    {
        return $this->getData(self::LAST_REPORTED_AT);
    }

    /**
     * @inheritDoc
     */
    public function setIpAddress(string $value): void
    {
        $this->setData(self::IP_ADDRESS, $value);
    }

    /**
     * @inheritDoc
     */
    public function setIsPublic(bool $value): void
    {
        $this->setData(self::IS_PUBLIC, $value);
    }

    /**
     * @inheritDoc
     */
    public function setIpVersion(int $value): void
    {
        $this->setData(self::IP_VERSION, $value);
    }

    /**
     * @inheritDoc
     */
    public function setIsWhitelisted(bool $value): void
    {
        $this->setData(self::IS_WHITELISTED, $value);
    }

    /**
     * @inheritDoc
     */
    public function setAbuseConfidenceScore(string $value): void
    {
        $this->setData(self::ABUSE_CONFIDENCE_SCORE, $value);
    }

    /**
     * @inheritDoc
     */
    public function setCountryCode(string $value): void
    {
        $this->setData(self::COUNTRY_CODE, $value);
    }

    /**
     * @inheritDoc
     */
    public function setUsageType(string $value): void
    {
        $this->setData(self::USAGE_TYPE, $value);
    }

    /**
     * @inheritDoc
     */
    public function setIsp(string $value): void
    {
        $this->setData(self::ISP, $value);
    }

    /**
     * @inheritDoc
     */
    public function setDomain(string $value): void
    {
        $this->setData(self::DOMAIN, $value);
    }

    /**
     * @inheritDoc
     */
    public function setHostnames(array $value = []): void
    {
        $this->setData(self::HOSTNAMES, $value);
    }

    /**
     * @inheritDoc
     */
    public function setTotalReports(int $value): void
    {
        $this->setData(self::TOTAL_REPORTS, $value);
    }

    /**
     * @inheritDoc
     */
    public function setNumDistinctUsers(int $value): void
    {
        $this->setData(self::NUM_DISTINCT_USERS);
    }

    /**
     * @param string $value
     */
    public function setLastReportedAt(string $value): void
    {
        $this->setData(self::LAST_REPORTED_AT, $value);
    }

}


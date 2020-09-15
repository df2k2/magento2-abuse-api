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

    public function __construct(array $data = [])
    {
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

    public function getIpVersion(): int
    {
        return $this->getData(self::IP_VERSION);
    }

    public function getIsWhitelisted(): bool
    {
        return $this->getData(self::IS_WHITELISTED);
    }

    public function getAbuseConfidenceScore(): int
    {
        return $this->getData(self::ABUSE_CONFIDENCE_SCORE);
    }

    public function getCountryCode(): string
    {
        return $this->getData(self::COUNTRY_CODE);
    }

    public function getUsageType(): string
    {
        return $this->getData(self::USAGE_TYPE);
    }

    public function getIsp(): string
    {
        return $this->getData(self::ISP);
    }

    public function getDomain(): string
    {
        return $this->getData(self::DOMAIN);
    }

    public function getHostnames(): array
    {
        return $this->getData(self::HOSTNAMES);
    }

    public function getTotalReports(): int
    {
        return $this->getData(self::TOTAL_REPORTS);
    }

    public function getNumDistinctUsers(): int
    {
        return $this->getData(self::NUM_DISTINCT_USERS);
    }

    public function getLastReportedAt(): string
    {
        return $this->getData(self::LAST_REPORTED_AT);
    }

    public function setIpAddress(string $value): void
    {
        $this->setData(self::IP_ADDRESS, $value);
    }

    public function setIsPublic(bool $value): void
    {
        $this->setData(self::IS_PUBLIC, $value);
    }

    public function setIpVersion(int $value): void
    {
        // TODO: Implement setIpVersion() method.
    }

    public function setIsWhitelisted(bool $value): void
    {
        // TODO: Implement setIsWhitelisted() method.
    }

    public function setAbuseConfidenceScore(string $value): void
    {
        // TODO: Implement setAbuseConfidenceScore() method.
    }

    public function setCountryCode(string $value): void
    {
        // TODO: Implement setCountryCode() method.
    }

    public function setUsageType(string $value): void
    {
        // TODO: Implement setUsageType() method.
    }

    public function setIsp(string $value): void
    {
        // TODO: Implement setIsp() method.
    }

    public function setDomain(string $value): void
    {
        // TODO: Implement setDomain() method.
    }

    public function setHostnames(array $value = []): void
    {
        $this->setData(self::HOSTNAMES, $value);
    }

    public function setTotalReports(int $value): void
    {
        $this->setData(self::TOTAL_REPORTS, $value);
    }

    public function setNumDistinctUsers(int $value): void
    {
        $this->setData(self::NUM_DISTINCT_USERS);
    }

    public function setLastReportedAt(string $value): void
    {
        $this->setData(self::LAST_REPORTED_AT, $value);
    }

}



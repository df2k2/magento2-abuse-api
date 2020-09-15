<?php

/**
 * Copyright 2020 (c) Chris Snedaker, All rights reserved.
 */

declare(strict_types=1);

namespace Cs\AbuseApi\Api\Data;

/**
 * Interface for response of CHECK interface
 */
interface CheckResponseInterface
{

    public const IP_ADDRESS = 'ip_address';
    public const IS_PUBLIC = 'is_public';
    public const IP_VERSION = 'ip_version';
    public const IS_WHITELISTED = 'is_whitelisted';
    public const ABUSE_CONFIDENCE_SCORE = 'abuse_confidence_score';
    public const COUNTRY_CODE = 'country_code';
    public const USAGE_TYPE = 'usage_type';
    public const ISP = 'isp';
    public const DOMAIN = 'domain';
    public const HOSTNAMES = 'hostnames';
    public const TOTAL_REPORTS = 'total_reports';
    public const NUM_DISTINCT_USERS = 'num_distinct_users';
    public const LAST_REPORTED_AT = 'last_reported_at';

    /**
     * @return string
     */
    public function getIpAddress(): string;

    /**
     * @return bool
     */
    public function getIsPublic(): bool;

    /**
     * @return int
     */
    public function getIpVersion(): int;

    /**
     * @return bool
     */
    public function getIsWhitelisted(): bool;

    /**
     * @return int
     */
    public function getAbuseConfidenceScore(): int;

    /**
     * @return string
     */
    public function getCountryCode(): string;

    /**
     * @return string
     */
    public function getUsageType(): string;

    /**
     * @return string
     */
    public function getIsp(): string;

    /**
     * @return string
     */
    public function getDomain(): string;

    /**
     * @return array
     */
    public function getHostnames(): array;

    /**
     * @return int
     */
    public function getTotalReports(): int;

    /**
     * @return int
     */
    public function getNumDistinctUsers(): int;

    /**
     * @return string
     */
    public function getLastReportedAt(): string;

    /**
     * @param string $value
     */
    public function setIpAddress(string $value): void;

    /**
     * @param bool $value
     */
    public function setIsPublic(bool $value): void;

    /**
     * @param int $value
     */
    public function setIpVersion(int $value): void;

    /**
     * @param bool $value
     */
    public function setIsWhitelisted(bool $value): void;

    /**
     * @param string $value
     */
    public function setAbuseConfidenceScore(string $value): void;

    /**
     * @param string $value
     */
    public function setCountryCode(string $value): void;

    /**
     * @param string $value
     */
    public function setUsageType(string $value): void;

    /**
     * @param string $value
     */
    public function setIsp(string $value): void;

    /**
     * @param string $value
     */
    public function setDomain(string $value): void;

    /**
     * @param array $value
     */
    public function setHostnames(array $value = []): void;

    /**
     * @param int $value
     */
    public function setTotalReports(int $value): void;

    /**
     * @param int $value
     */
    public function setNumDistinctUsers(int $value): void;

    /**
     * @param string $value
     */
    public function setLastReportedAt(string $value): void;

}


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

    public function getIpVersion(): int;

    public function getIsWhitelisted(): bool;

    public function getAbuseConfidenceScore(): int;

    public function getCountryCode(): string;

    public function getUsageType(): string;

    public function getIsp(): string;

    public function getDomain(): string;

    public function getHostnames(): array;

    public function getTotalReports(): int;

    public function getNumDistinctUsers(): int;

    public function getLastReportedAt(): string;

    public function setIpAddress(string $value): void;

    public function setIsPublic(bool $value): void;

    public function setIpVersion(int $value): void;

    public function setIsWhitelisted(bool $value): void;

    public function setAbuseConfidenceScore(string $value): void;

    public function setCountryCode(string $value): void;

    public function setUsageType(string $value): void;

    public function setIsp(string $value): void;

    public function setDomain(string $value): void;

    public function setHostnames(array $value = []): void;

    public function setTotalReports(int $value): void;

    public function setNumDistinctUsers(int $value): void;

    public function setLastReportedAt(string $value): void;

}


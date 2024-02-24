<?php
/**
 * Copyright © Copyright 2024 (c) Chris Snedaker.  All Rights Reserved. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Cs\AbuseApi\Api\Data;

interface CheckInterface
{

    const USAGE_TYPE = 'usage_type';
    const IS_PUBLIC = 'is_public';
    const ABUSE_CONFIDENCE_SCORE = 'abuse_confidence_score';
    const IS_TOR = 'is_tor';
    const CHECK_ID = 'check_id';
    const UPDATED_AT = 'updated_at';
    const HOSTNAMES = 'hostnames';
    const DOMAIN = 'domain';
    const IS_WHITELISTED = 'is_whitelisted';
    const COUNTRY_CODE = 'country_code';
    const IP_VERSION = 'ip_version';
    const ISP = 'isp';
    const CREATED_AT = 'created_at';
    const NUM_DISTINCT_USERS = 'num_distinct_users';
    const IP_ADDRESS = 'ip_address';
    const LAST_REPORTED_AT = 'last_reported_at';
    const TOTAL_REPORTS = 'total_reports';
    const CHECK_DAYS = 'check_days';

    /**
     * Get check_id
     * @return string|null
     */
    public function getCheckId();

    /**
     * Set check_id
     * @param string $checkId
     * @return \Cs\AbuseApi\Check\Api\Data\CheckInterface
     */
    public function setCheckId($checkId);

    /**
     * Get ip_address
     * @return string|null
     */
    public function getIpAddress();

    /**
     * Set ip_address
     * @param string $ipAddress
     * @return \Cs\AbuseApi\Check\Api\Data\CheckInterface
     */
    public function setIpAddress($ipAddress);

    /**
     * Get is_public
     * @return string|null
     */
    public function getIsPublic();

    /**
     * Set is_public
     * @param string $isPublic
     * @return \Cs\AbuseApi\Check\Api\Data\CheckInterface
     */
    public function setIsPublic($isPublic);

    /**
     * Get ip_version
     * @return string|null
     */
    public function getIpVersion();

    /**
     * Set ip_version
     * @param string $ipVersion
     * @return \Cs\AbuseApi\Check\Api\Data\CheckInterface
     */
    public function setIpVersion($ipVersion);

    /**
     * Get abuse_confidence_score
     * @return string|null
     */
    public function getAbuseConfidenceScore();

    /**
     * Set abuse_confidence_score
     * @param string $abuseConfidenceScore
     * @return \Cs\AbuseApi\Check\Api\Data\CheckInterface
     */
    public function setAbuseConfidenceScore($abuseConfidenceScore);

    /**
     * Get country_code
     * @return string|null
     */
    public function getCountryCode();

    /**
     * Set country_code
     * @param string $countryCode
     * @return \Cs\AbuseApi\Check\Api\Data\CheckInterface
     */
    public function setCountryCode($countryCode);

    /**
     * Get is_whitelisted
     * @return string|null
     */
    public function getIsWhitelisted();

    /**
     * Set is_whitelisted
     * @param string $isWhitelisted
     * @return \Cs\AbuseApi\Check\Api\Data\CheckInterface
     */
    public function setIsWhitelisted($isWhitelisted);

    /**
     * Get usage_type
     * @return string|null
     */
    public function getUsageType();

    /**
     * Set usage_type
     * @param string $usageType
     * @return \Cs\AbuseApi\Check\Api\Data\CheckInterface
     */
    public function setUsageType($usageType);

    /**
     * Get isp
     * @return string|null
     */
    public function getIsp();

    /**
     * Set isp
     * @param string $isp
     * @return \Cs\AbuseApi\Check\Api\Data\CheckInterface
     */
    public function setIsp($isp);

    /**
     * Get domain
     * @return string|null
     */
    public function getDomain();

    /**
     * Set domain
     * @param string $domain
     * @return \Cs\AbuseApi\Check\Api\Data\CheckInterface
     */
    public function setDomain($domain);

    /**
     * Get total_reports
     * @return string|null
     */
    public function getTotalReports();

    /**
     * Set total_reports
     * @param string $totalReports
     * @return \Cs\AbuseApi\Check\Api\Data\CheckInterface
     */
    public function setTotalReports($totalReports);

    /**
     * Get num_distinct_users
     * @return string|null
     */
    public function getNumDistinctUsers();

    /**
     * Set num_distinct_users
     * @param string $numDistinctUsers
     * @return \Cs\AbuseApi\Check\Api\Data\CheckInterface
     */
    public function setNumDistinctUsers($numDistinctUsers);

    /**
     * Get last_reported_at
     * @return string|null
     */
    public function getLastReportedAt();

    /**
     * Set last_reported_at
     * @param string $lastReportedAt
     * @return \Cs\AbuseApi\Check\Api\Data\CheckInterface
     */
    public function setLastReportedAt($lastReportedAt);

    /**
     * Get created_at
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Set created_at
     * @param string $createdAt
     * @return \Cs\AbuseApi\Check\Api\Data\CheckInterface
     */
    public function setCreatedAt($createdAt);

    /**
     * Get updated_at
     * @return string|null
     */
    public function getUpdatedAt();

    /**
     * Set updated_at
     * @param string $updatedAt
     * @return \Cs\AbuseApi\Check\Api\Data\CheckInterface
     */
    public function setUpdatedAt($updatedAt);

    /**
     * Get check_days
     * @return string|null
     */
    public function getCheckDays();

    /**
     * Set check_days
     * @param string $checkDays
     * @return \Cs\AbuseApi\Check\Api\Data\CheckInterface
     */
    public function setCheckDays($checkDays);

    /**
     * Get hostnames
     * @return array|null
     */
    public function getHostnames();

    /**
     * Set hostnames
     * @param array $hostnames
     * @return \Cs\AbuseApi\Check\Api\Data\CheckInterface
     */
    public function setHostnames(array $hostnames);

    /**
     * Get is_tor
     * @return string|null
     */
    public function getIsTor();

    /**
     * Set is_tor
     * @param string $isTor
     * @return \Cs\AbuseApi\Check\Api\Data\CheckInterface
     */
    public function setIsTor($isTor);
}


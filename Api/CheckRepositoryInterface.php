<?php
/**
 * Copyright © Copyright 2024 (c) Chris Snedaker.  All Rights Reserved. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Cs\AbuseApi\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface CheckRepositoryInterface
{

    /**
     * Save Check
     * @param \Cs\AbuseApi\Api\Data\CheckInterface $check
     * @return \Cs\AbuseApi\Api\Data\CheckInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Cs\AbuseApi\Api\Data\CheckInterface $check
    );

    /**
     * Retrieve Check
     * @param string $checkId
     * @return \Cs\AbuseApi\Api\Data\CheckInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($checkId);

    /**
     * Retrieve Check matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Cs\AbuseApi\Api\Data\CheckSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Check
     * @param \Cs\AbuseApi\Api\Data\CheckInterface $check
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Cs\AbuseApi\Api\Data\CheckInterface $check
    );

    /**
     * Delete Check by ID
     * @param string $checkId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($checkId);
}


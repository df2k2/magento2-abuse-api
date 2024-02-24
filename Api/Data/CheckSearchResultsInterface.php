<?php
/**
 * Copyright © Copyright 2024 (c) Chris Snedaker.  All Rights Reserved. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Cs\AbuseApi\Api\Data;

interface CheckSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Check list.
     * @return \Cs\AbuseApi\Api\Data\CheckInterface[]
     */
    public function getItems();

    /**
     * Set ip_address list.
     * @param \Cs\AbuseApi\Api\Data\CheckInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}


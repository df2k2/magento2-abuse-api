<?php
/**
 * Copyright © Copyright 2024 (c) Chris Snedaker.  All Rights Reserved. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Cs\AbuseApi\Model\ResourceModel\Check;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    /**
     * @inheritDoc
     */
    protected $_idFieldName = 'check_id';

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(
            \Cs\AbuseApi\Model\Check::class,
            \Cs\AbuseApi\Model\ResourceModel\Check::class
        );
    }
}


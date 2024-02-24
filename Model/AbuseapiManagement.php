<?php
/**
 * Copyright © Copyright 2024 (c) Chris Snedaker.  All Rights Reserved. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Cs\AbuseApi\Model;

class AbuseapiManagement implements \Cs\AbuseApi\Api\AbuseapiManagementInterface
{

    /**
     * {@inheritdoc}
     */
    public function getAbuseapi($param)
    {
        return 'hello api GET return the $param ' . $param;
    }

    /**
     * {@inheritdoc}
     */
    public function postAbuseapi($param)
    {
        return 'hello api POST return the $param ' . $param;
    }
}


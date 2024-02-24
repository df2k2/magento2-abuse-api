<?php
/**
 * Copyright © Copyright 2024 (c) Chris Snedaker.  All Rights Reserved. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Cs\AbuseApi\Api;

interface AbuseapiManagementInterface
{

    /**
     * GET for abuseapi api
     * @param string $param
     * @return string
     */
    public function getAbuseapi($param);

    /**
     * POST for abuseapi api
     * @param string $param
     * @return string
     */
    public function postAbuseapi($param);
}


<?php
/**
 * Copyright 2020 (c) Chris Snedaker, All rights reserved.
 */

declare(strict_types=1);

namespace Cs\AbuseApi\Model\Client;

interface ResponseInterface
{
    public function setIpAddress($data);
    public function getIpAddress();


}



<?php
/**
 * Copyright 2020 (c) Chris Snedaker, All rights reserved.
 */

declare(strict_types=1);

namespace Cs\AbuseApi\Api;

/**
 * Used for managing Abuse IP DB config settings
 *
 */
interface ConfigInterface
{
    /**
     * Api Key Configuration
     *
     * @return string|null
     */
    public function getApiKey(): ?string;

    /**
     * Base URI
     *
     * @return string
     */
    public function getBaseUri(): string;
}


<?php
/**
 * Copyright 2020 (c) Chris Snedaker, All rights reserved.
 */

declare(strict_types=1);

namespace Cs\AbuseApi\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;

/**
 * Source Options for Max Days Configuration settings
 *
 */
class MaxDays implements OptionSourceInterface
{

    /**
     * @return array[]
     */
    public function toOptionArray(): array
    {
        return [
            ['value' => '15', 'label' => __('15 Days')],
            ['value' => '30', 'label' => __('30 Days')],
            ['value' => '60', 'label' => __('60 Days')],
            ['value' => '90', 'label' => __('90 Days')]
        ];
    }

}

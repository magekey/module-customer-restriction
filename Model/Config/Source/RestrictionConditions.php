<?php
/**
 * Copyright © MageKey. All rights reserved.
 * See LICENSE.txt for license details.
 */
namespace MageKey\CustomerRestriction\Model\Config\Source;

class RestrictionConditions implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * {@inheritdoc}
     *
     * @codeCoverageIgnore
     */
    public function toOptionArray()
    {
        return [
            ['value' => 'allow', 'label' => __('Apply as allowed conditions only')],
            ['value' => 'deny', 'label' => __('Apply as denied conditions only')]
        ];
    }
}

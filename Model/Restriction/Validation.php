<?php
/**
 * Copyright © MageKey. All rights reserved.
 * See LICENSE.txt for license details.
 */
namespace MageKey\CustomerRestriction\Model\Restriction;

use Magento\Framework\Exception\LocalizedException;
use MageKey\CustomerRestriction\Helper\Data as RestrictionHelper;

class Validation
{
    /**
     * @var RestrictionHelper
     */
    protected $restrictionHelper;

    /**
     * @var Pool
     */
    protected $restrictionPool;

    /**
     * @param RestrictionHelper $restrictionHelper
     * @param Pool $restrictionPool
     */
    public function __construct(
        RestrictionHelper $restrictionHelper,
        Pool $restrictionPool
    ) {
        $this->restrictionHelper = $restrictionHelper;
        $this->restrictionPool = $restrictionPool;
    }

    /**
     * Validate restriction
     *
     * @param string $restriction
     * @param mixed $value
     * @param bool $throwException
     * @return bool
     */
    public function validate($restriction, $value, $throwException = true)
    {
        if ($this->restrictionHelper->isRestrictionEnabled($restriction)) {
            $observers = $this->restrictionPool->get($restriction);
            if (!empty($observers)) {
                foreach ($observers as $observer) {
                    $isValid = $observer->isValid($value);
                    if (!$observer->isAllowMode()) {
                        $isValid = !$isValid;
                    }
                    if (!$isValid) {
                        if ($throwException) {
                            $this->throwException($observer->getErrorMessage());
                        }
                        return false;
                    }
                }
            }
        }

        return true;
    }

    /**
     * Throw exception
     *
     * @param string $message
     */
    public function throwException($message = null)
    {
        throw new LocalizedException($message instanceof \Magento\Framework\Phrase ? $message : __($message));
    }
}

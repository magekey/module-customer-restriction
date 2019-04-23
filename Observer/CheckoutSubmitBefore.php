<?php
/**
 * Copyright © MageKey. All rights reserved.
 * See LICENSE.txt for license details.
 */
namespace MageKey\CustomerRestriction\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

use MageKey\CustomerRestriction\Helper\Data as RestrictionHelper;
use MageKey\CustomerRestriction\Model\Restriction\Validation as RestrictionValidation;

class CheckoutSubmitBefore implements ObserverInterface
{
    /**
     * @var RestrictionValidation
     */
    private $restrictionValidation;

    /**
     * @param RestrictionValidation $restrictionValidation
     */
    public function __construct(
        RestrictionValidation $restrictionValidation
    ) {
        $this->restrictionValidation = $restrictionValidation;
    }

    /**
     * @return void
     */
    public function execute(Observer $observer)
    {
        $quote = $observer->getEvent()->getQuote();
        $this->restrictionValidation->validate(RestrictionHelper::RESTRICTION_REGISTRATION, $quote->getCustomerEmail());
    }
}

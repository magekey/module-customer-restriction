<?php
/**
 * Copyright © MageKey. All rights reserved.
 */
namespace MageKey\CustomerRestriction\Plugin;

use Magento\Customer\Model\AccountManagement as CustomerAccountManagement;
use Magento\Customer\Api\Data\CustomerInterface;
use MageKey\CustomerRestriction\Helper\Data as RestrictionHelper;
use MageKey\CustomerRestriction\Model\Restriction\Validation as RestrictionValidation;

class AccountManagement
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
     * {@inheritdoc}
     */
    public function beforeCreateAccount(
        CustomerAccountManagement $subject,
        CustomerInterface $customer,
        $password = null,
        $redirectUrl = ''
    ) {
        $this->restrictionValidation->validate(RestrictionHelper::RESTRICTION_REGISTRATION, $customer->getEmail());
        return [$customer, $password, $redirectUrl];
    }
    
    /**
     * {@inheritdoc}
     */
    public function beforeAuthenticate(
        CustomerAccountManagement $subject,
        $username,
        $password
    ) {
        $this->restrictionValidation->validate(RestrictionHelper::RESTRICTION_LOGIN, $username);
        return [$username, $password];
    }
}

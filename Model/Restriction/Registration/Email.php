<?php
/**
 * Copyright © MageKey. All rights reserved.
 */
namespace MageKey\CustomerRestriction\Model\Restriction\Registration;

use MageKey\CustomerRestriction\Model\Restriction\RestrictionInterface;
use MageKey\CustomerRestriction\Helper\Data as RestrictionHelper;
use MageKey\CustomerRestriction\Model\Restriction\Filter as RestrictionFilter;

class Email implements RestrictionInterface
{
    /**
     * @var RestrictionHelper
     */
    protected $restrictionHelper;
    
    /**
     * @var RestrictionFilter
     */
    protected $restrictionFilter;

    /**
     * @param RestrictionHelper $restrictionHelper
     * @param RestrictionFilter $restrictionFilter
     */
    public function __construct(
        RestrictionHelper $restrictionHelper,
        RestrictionFilter $restrictionFilter
    ) {
        $this->restrictionHelper = $restrictionHelper;
        $this->restrictionFilter = $restrictionFilter;
    }
    
    /**
     * Check if restriction is valid
     *
     * @param mixed $value
     * @return bool
     */
    public function isValid($value)
    {
        $emailPatterns = $this->restrictionHelper->getRestrictionPatterns(RestrictionHelper::RESTRICTION_REGISTRATION, 'email/patterns');
        if (!empty($emailPatterns)) {
            if (!$this->restrictionFilter->isAllPatternsInvalid($value, $emailPatterns)) {
                return false;
            }
        }
        return true;
    }
    
    /**
     * Retrieve error message
     *
     * @return string
     */
    public function getErrorMessage()
    {
        return (string)$this->restrictionHelper
            ->getRestrictionData(RestrictionHelper::RESTRICTION_REGISTRATION, 'email/error_message');
    }
}

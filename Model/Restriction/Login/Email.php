<?php
/**
 * Copyright © MageKey. All rights reserved.
 */
namespace MageKey\CustomerRestriction\Model\Restriction\Login;

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
     * Check if is allow mode
     *
     * @return bool
     */
    public function isAllowMode()
    {
        return $this->restrictionHelper->isAllowRestriction(RestrictionHelper::RESTRICTION_LOGIN, 'email');
    }
    
    /**
     * Check if restriction is valid in allow mode
     *
     * @param mixed $value
     * @return bool
     */
    public function isValid($value)
    {
        $emailPatterns = $this->restrictionHelper->getRestrictionPatterns(RestrictionHelper::RESTRICTION_LOGIN, 'email/patterns');
        if (!empty($emailPatterns)) {
            return $this->restrictionFilter->isAnyPatternValid($value, $emailPatterns);
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
            ->getRestrictionData(RestrictionHelper::RESTRICTION_LOGIN, 'email/error_message');
    }
}

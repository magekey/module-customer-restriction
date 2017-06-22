<?php
/**
 * Copyright © MageKey. All rights reserved.
 */
namespace MageKey\CustomerRestriction\Model\Restriction;

interface RestrictionInterface 
{
    /**
     * Check if is allow mode
     *
     * @return bool
     */
    public function isAllowMode();
    
    /**
     * Check if restriction is valid in allow mode
     *
     * @param mixed $value
     * @return bool
     */
    public function isValid($value);
    
    /**
     * Retrieve error message
     *
     * @return string
     */
    public function getErrorMessage();
}

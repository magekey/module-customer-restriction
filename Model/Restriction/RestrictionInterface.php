<?php
/**
 * Copyright © MageKey. All rights reserved.
 */
namespace MageKey\CustomerRestriction\Model\Restriction;

interface RestrictionInterface 
{
    /**
     * Check if restriction is valid
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

<?php
/**
 * Copyright © MageKey. All rights reserved.
 */
namespace MageKey\CustomerRestriction\Model\Restriction;

class Filter
{
    /**
     * Check if pattern valid
     *
     * @param string $value
     * @param string $pattern
     * @return bool
     */
    public function isPatternValid($value, $pattern)
    {
        return preg_match('#' . $pattern . '#si', $value);
    }
    
    /**
     * Check if all patterns invalid
     *
     * @param string $value
     * @param array $patterns
     * @return bool
     */
    public function isAllPatternsInvalid($value, array $patterns)
    {
        foreach ($patterns as $pattern) {
            if ($this->isPatternValid($value, $pattern)) {
                return false;
            }
        }
        
        return true;
    }
}

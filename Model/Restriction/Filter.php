<?php
/**
 * Copyright © MageKey. All rights reserved.
 * See LICENSE.txt for license details.
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
        try {
            return preg_match('#' . $pattern . '#si', $value);
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Check if any pattern valid
     *
     * @param string $value
     * @param array $patterns
     * @return bool
     */
    public function isAnyPatternValid($value, array $patterns)
    {
        foreach ($patterns as $pattern) {
            if ($this->isPatternValid($value, $pattern)) {
                return true;
            }
        }
        return false;
    }
}

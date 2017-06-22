<?php
/**
 * Copyright © MageKey. All rights reserved.
 */
namespace MageKey\CustomerRestriction\Helper;

use Magento\Store\Model\ScopeInterface;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    const RESTRICTION_REGISTRATION = 'registration';
    
    const RESTRICTION_LOGIN = 'login';
    
    /**
     * Check if restriction enabled
     * 
     * @param string $restriction
     * @return bool
     */
    public function isRestrictionEnabled($restriction)
    {
        return $this->scopeConfig->isSetFlag(
            'magekey_customerrestriction/' . $restriction . '/enabled',
            ScopeInterface::SCOPE_STORE
        );
    }
    
    /**
     * Check if allow restriction
     * 
     * @param string $restriction
     * @return bool
     */
    public function isAllowRestriction($restriction, $path)
    {
        return $this->getRestrictionData($restriction, $path . '/condition') == 'allow' ? true : false;
    }
    
    /**
     * Retrieve restriction data
     * 
     * @param string $restriction
     * @param string $path
     * @return mixed
     */
    public function getRestrictionData($restriction, $path)
    {
        return $this->scopeConfig->getValue(
            'magekey_customerrestriction/' . $restriction . '/' . $path,
            ScopeInterface::SCOPE_STORE
        );
    }
    
    /**
     * Retrieve restriction patterns
     * 
     * @param string $restriction
     * @param string $path
     * @return array
     */
    public function getRestrictionPatterns($restriction, $path)
    {
        $arr = [];
        if ($patterns = $this->getRestrictionData($restriction, $path)) {
            $patterns = unserialize($patterns);
            if (is_array($patterns)) {
                foreach ($patterns as $item) {
                    if (!empty($item['pattern'])) {
                        $arr[] = $item['pattern'];
                    }
                }
            }
        }
        
        return $arr;
    }
}

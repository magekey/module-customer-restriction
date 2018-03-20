<?php
/**
 * Copyright © MageKey. All rights reserved.
 * See LICENSE.txt for license details.
 */
namespace MageKey\CustomerRestriction\Block\Adminhtml\System\Config;

use Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray;

class PatternMap extends AbstractFieldArray
{
    /**
     * Internal constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->addColumn('pattern', ['label' => __('Pattern')]);
        $this->_addAfter = false;
        $this->_addButtonLabel = __('Add');
        parent::_construct();
    }
}

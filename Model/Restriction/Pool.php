<?php
/**
 * Copyright © MageKey. All rights reserved.
 */
namespace MageKey\CustomerRestriction\Model\Restriction;

class Pool
{
    /**
     * @var \Magento\Framework\ObjectManagerInterface
     */
    protected $observerFactory;
    
    /**
     * @var array
     */
    protected $restrictions;

    /**
     * @param array $restrictions
     */
    public function __construct(
        \Magento\Framework\ObjectManagerInterface $observerFactory,
        array $restrictions
    ) {
        $this->observerFactory = $observerFactory;
        $this->restrictions = $restrictions;
    }
    
    /**
     * Retrieve restriction observers
     *
     * @param string $restriction
     * @return RestrictionInterface[]
     */
    public function get($restriction)
    {
        $observers = [];
        if (!empty($this->restrictions[$restriction])) {
            foreach ($this->restrictions[$restriction] as $observerClass) {
                $observers[] = $this->createObserver($observerClass);
            }
        }
        return $observers;
    }
    
    /**
     * Retrieve restriction observers
     *
     * @param string $observerClass
     * @return RestrictionInterface
     */
    protected function createObserver($observerClass)
    {
        $observer = $this->observerFactory->create($observerClass);
        if (!$observer instanceof RestrictionInterface) {
            throw new \Magento\Framework\Exception\LocalizedException(
                __('Restriction observer "%1" should instanceof %2', $observerClass, RestrictionInterface::class)
            );
        }
        return $observer;
    }
}

<?php
/**
 * Add some additional parameters for ObjectSelect element
 * That allows make filters and orders of results
 * 
 * @author k.malinin
 */
namespace Common\Form\Element;

use RuntimeException;
use DoctrineModule\Form\Element\Proxy as DoctrineProxy;

class Proxy extends DoctrineProxy
{
    /**
     * @var bool
     */
    protected $displayLastItem = false;

    /**
     * @var string
     */
    protected $lastItemLabel;
    
    /**
     * @var string
     */
    protected $lastItemValue;
    
    /**
     * @var array
     */
    protected $filter = array();
    
    /**
     * @var array
     */
    protected $order = array();
    
    public function setOptions($options)
    {
        if (isset($options['display_last_item'])) {
            $this->setDisplayLastItem($options['display_last_item']);
        }

        if (isset($options['last_item_label'])) {
            $this->setLastItemLabel($options['last_item_label']);
        }

        if (isset($options['last_item_value'])) {
            $this->setLastItemValue($options['last_item_value']);
        }
        
        if (isset($options['filter'])) {
            $this->setFilter($options['filter']);
        }
        
        if (isset($options['order'])) {
            $this->setOrder($options['order']);
        }

        parent::setOptions($options);
    }

    /**
     * Load value options
     *
     * @throws \RuntimeException
     * @return void
     */
    protected function loadValueOptions()
    {
        parent::loadValueOptions();
        
        if ($this->displayLastItem) {
            $this->valueOptions[$this->lastItemValue] = $this->lastItemLabel;
        }
    }

    /**
     * Load objects
     *
     * @throws RuntimeException
     *
     * @return void
     */
    protected function loadObjects()
    {
        if (!empty($this->objects)) {
            return;
        }

        $findMethod = (array) $this->getFindMethod();
        if (!$findMethod) {
            $this->objects = $this->objectManager->getRepository($this->targetClass)->findBy($this->getFilter(), $this->getOrder());
        } else {
            parent::loadObjects();
        }
    }

    /**
     * 
     * @return boolean
     */
    public function getDisplayLastItem()
    {
        return $this->displayLastItem;
    }
    
    /**
     * 
     * @param type $displayLastItem
     * @return \Common\Form\Element\Proxy
     */
    public function setDisplayLastItem($displayLastItem)
    {
        $this->displayLastItem = $displayLastItem;
        return $this;
    }

    /**
     * 
     * @return string
     */
    public function getLastItemLabel()
    {
        return $this->lastItemLabel;
    }
    
    /**
     * 
     * @param string $lastItemLabel
     * @return \Common\Form\Element\Proxy
     */
    public function setLastItemLabel($lastItemLabel)
    {
        $this->lastItemLabel = $lastItemLabel;
        return $this;
    }

    /**
     * 
     * @return mixed
     */
    public function getLastItemValue()
    {
        return $this->lastItemValue;
    }
    
    /**
     * 
     * @param mixed $lastItemValue
     * @return \Common\Form\Element\Proxy
     */
    public function setLastItemValue($lastItemValue)
    {
        $this->lastItemValue = $lastItemValue;
        return $this;
    }

    /**
     * 
     * @return array
     */
    public function getFilter()
    {
        return $this->filter;
    }
    
    /**
     * 
     * @param array $filter
     * @return \Common\Form\Element\Proxy
     * @throws RuntimeException
     */
    public function setFilter($filter)
    {
        if (!is_array($filter)) {
            throw new RuntimeException('Filter must be array!');
        }
        $this->filter = $filter;
        return $this;
    }
    
    /**
     * 
     * @return array
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * 
     * @param array $order
     * @return \Common\Form\Element\Proxy
     * @throws RuntimeException
     */
    public function setOrder($order)
    {
        if (!is_array($order)) {
            throw new RuntimeException('Order must be array!');
        }
        $orderData = array();
        foreach ($order as $field => $value) {
            if (is_int($field)) {
                $orderData[$value] = 'ASC';
            } else {
                $orderData[$field] = $value;
            }
        }
        $this->order = $orderData;
        return $this;
    }
}

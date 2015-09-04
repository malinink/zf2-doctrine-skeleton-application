<?php
/**
 * Inject modified Proxy object as default proxy
 * 
 * @author k.malinin
 */
namespace Common\Form\Element;

use DoctrineModule\Form\Element\ObjectSelect as DoctrineObjectSelect;
use Common\Form\Element\Proxy;

class ObjectSelect extends DoctrineObjectSelect
{
    /**
     * @return Proxy
     */
    public function getProxy()
    {
        if (null === $this->proxy) {
            $this->proxy = new Proxy();
        }
        return $this->proxy;
    }
}

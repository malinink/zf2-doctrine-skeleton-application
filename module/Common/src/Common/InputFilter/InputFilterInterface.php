<?php
/**
 * 
 * @author k.malinin
 */
namespace Common\InputFilter;

use Zend\InputFilter\InputFilterInterface as ZendInputFilterInterface;
use Common\Wrapper\EntityManagerInterface;

interface InputFilterInterface extends ZendInputFilterInterface, EntityManagerInterface
{
    /**
     * Form automaticaly calls that method after injection completed
     */
    public function init();
}

<?php
/**
 * 
 * @author k.malinin
 */
namespace Common\Form;

use Zend\Form\FormInterface as ZendFormInterface;
use Zend\InputFilter\InputFilterInterface;
use Common\Wrapper\EntityManagerWrapperInterface;

interface FormInterface extends ZendFormInterface, EntityManagerWrapperInterface
{
    /**
     * @param InputFilterInterface $inputFilter
     */
    public function setInputFilter(InputFilterInterface $inputFilter = null);
}

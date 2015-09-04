<?php
/**
 * Abstract Form Class, All forms in projects must extend that one
 * Main feature is that we don't need to set up InputFiler
 * 
 * @author k.malinin
 */
namespace Common\Form;

use Zend\Form\Form as ZendForm;
use Zend\InputFilter\InputFilterInterface;
use Common\InputFilter\InputFilterInterface as CommonInputFilterInterface;
use Common\Wrapper\EntityManagerWrapper;

abstract class Form extends ZendForm implements FormInterface
{
    use EntityManagerWrapper;
    
    /**
     * Default Input filter name
     * 
     * @var string 
     */
    protected $inputFilterClassname = 'Zend\InputFilter\InputFilter';

    /**
     * Set default data to form
     * @param string $name
     */
    public function __construct($name = null)
    {
        parent::__construct($name);
        $this->setAttribute('role', 'form');
        $this->setAttribute('method', 'post');
        $this->setAttribute('accept-charset', 'utf-8');
        $this->setAttribute('data-async', 'true');
    }
    
    /**
     * 
     * @param InputFilterInterface $inputFilter
     * @throws Exception\InvalidInputFilterClassnameException
     */
    public function setInputFilter(InputFilterInterface $inputFilter = null)
    {
        if (is_null($inputFilter)) {
            if (!isset($this->filter)) {
                if (!class_exists($this->inputFilterClassname)) {
                    throw new Exception\InvalidInputFilterClassnameException;
                }
                $filter = new $this->inputFilterClassname();
                $this->filter = $filter;
            }
        } else {
            parent::setInputFilter($inputFilter);
        }
        // inject EM and call init here
        if (($this->filter instanceof CommonInputFilterInterface)
                && (!is_null($this->getEntityManager()))) {
            $this->filter->setEntityManager($this->getEntityManager());
            $this->filter->init();
        }
    }

    /**
     * Retrieve input filter used by this form
     *
     * @return null|InputFilterInterface
     */
    public function getInputFilter()
    {
        if (!isset($this->filter)) {
            $this->setInputFilter();
        }
        return parent::getInputFilter();
    }
    
    /**
     * Check wether form data is Valid and before that action
     * set Default Input Filer (if it is not set before) 
     * 
     * @return boolean
     */
    public function isValid()
    {
        $this->setInputFilter();
        $this->getInputFilter()->init();
        return parent::isValid();
    }
}

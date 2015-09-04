<?php
/**
 * 
 * @author k.malinin
 */
namespace Common\InputFilter;

use Zend\InputFilter\InputFilter as ZendInputFilter;
use Common\Wrapper\EntityManagerInterface;

class InputFilter extends ZendInputFilter implements InputFilterInterface
{
    use \Common\Wrapper\EntityManagerWrapper;
    
    /**
     * As normal - do nothing after construct
     */
    public function init()
    {
    }
}

<?php
/**
 * 
 * @author k.malinin
 */
namespace Common\Service\Model\Factory;

use Common\Wrapper\Service\Manager\CommonServiceManagerWrapper;
use Common\Wrapper\Service\Manager\ModelServiceManagerWrapper;

abstract class AbstractModelFactory implements ModelFactoryInterface
{
    use CommonServiceManagerWrapper;
    use ModelServiceManagerWrapper;
}

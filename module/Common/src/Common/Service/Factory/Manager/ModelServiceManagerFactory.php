<?php
/**
 * MSM used to store all Model Services
 * 
 * @author k.malinin
 */
namespace Common\Service\Factory\Manager;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Common\Service\Manager\ModelServiceManager;

class ModelServiceManagerFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return ModelServiceManager
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $modelServiceManager = new ModelServiceManager();
        return $modelServiceManager;
    }
}

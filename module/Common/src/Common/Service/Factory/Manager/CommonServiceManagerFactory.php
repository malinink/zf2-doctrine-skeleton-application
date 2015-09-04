<?php
/**
 * CSM used for storing all Services that we indeed in application at all, except Model Services
 * 
 * @author k.malinin
 */
namespace Common\Service\Factory\Manager;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Common\Service\Manager\CommonServiceManager;

class CommonServiceManagerFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return CommonServiceManager
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $commonServiceManager = new CommonServiceManager();
        /*
         * Inject EntityManager
         */
        $entityManager = $serviceLocator->get('Common\EntityManager');
        $commonServiceManager->setEntityManager($entityManager);
        /*
         * Inject Logger
         */
        $logger = $serviceLocator->get('Common\Logger');
        $commonServiceManager->setLogger($logger);
        return $commonServiceManager;
    }
}

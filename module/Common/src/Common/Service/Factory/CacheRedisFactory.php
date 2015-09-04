<?php
/**
 * 
 * @author k.malinin
 */
namespace Common\Service\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Doctrine\Common\Cache\RedisCache;
use DoctrineModule\Cache\ZendStorageCache;

class CacheRedisFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return RedisCache
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $cache = new ZendStorageCache($serviceLocator->get('redis'));
        return $cache;
    }
}

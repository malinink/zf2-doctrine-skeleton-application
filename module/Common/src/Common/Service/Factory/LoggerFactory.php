<?php
/**
 * 
 * @author k.malinin
 */
namespace Common\Service\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Log\Logger;
use Zend\Log\Writer\Stream;

class LoggerFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return Zend\Log\LoggerInterface
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('config');
        /*
         * set log dir, it is better to move away config from there
         */
        $path = '/data/';
        if (array_key_exists('logger', $config)) {
            $config = $config['logger'];
            if (array_key_exists('path', $config)) {
                $path = $config['path'];
            }
        }
        $logger = new Logger();
        $writer = new Stream($path . date('Y-m-d') . '-error.log');
        $logger->addWriter($writer);
        return $logger;
    }
}

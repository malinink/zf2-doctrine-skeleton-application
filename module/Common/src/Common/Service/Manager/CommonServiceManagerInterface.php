<?php
/**
 * 
 * @author k.malinin
 */
namespace Common\Service\Manager;

use Doctrine\ORM\EntityManagerInterface;
use Zend\Log\LoggerInterface;

interface CommonServiceManagerInterface
{
    /**
     * 
     * @return EntityManagerInterface
     */
    public function getEntityManager();

    /**
     * 
     * @param EntityManagerInterface $entityManager
     */
    public function setEntityManager(EntityManagerInterface $entityManager);
    
    /**
     * 
     * @return LoggerInterface
     */
    public function getLogger();
    
    /**
     * 
     * @param LoggerInterface $logger
     */
    public function setLogger(LoggerInterface $logger);
}

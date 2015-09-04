<?php
/**
 * Common Service Manager
 * That Manager provides all Global Services that our project ever have
 * 
 * @author k.malinin
 */
namespace Common\Service\Manager;

use Doctrine\ORM\EntityManagerInterface;
use Zend\Log\LoggerInterface;

class CommonServiceManager extends AbstractServiceManager
    implements CommonServiceManagerInterface
{
    /**
     *
     * @var EntityManagerInterface 
     */
    protected $entityManager;
    
    /**
     *
     * @var type LoggerInterface
     */
    protected $logger;
    
    /**
     * 
     * {@inheritdoc}
     */
    public function getEntityManager()
    {
        return $this->entityManager;
    }

    /**
     * 
     * {@inheritdoc}
     * @return \Common\Service\Manager\CommonServiceManager
     */
    public function setEntityManager(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        return $this;
    }
    
    /**
     * 
     * {@inheritdoc}
     */
    public function getLogger()
    {
        return $this->logger;
    }
    
    /**
     * 
     * {@inheritdoc}
     * @return \Common\Service\Manager\CommonServiceManager
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
        return $this;
    }
}

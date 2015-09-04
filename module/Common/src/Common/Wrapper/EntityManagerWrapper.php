<?php
/**
 * Getter and setter for Doctrine Entity Manager
 * 
 * @author k.malinin
 */
namespace Common\Wrapper;

use Doctrine\ORM\EntityManagerInterface;

trait EntityManagerWrapper
{
    /**
     *
     * @var EntityManagerInterface
     */
    protected $entityManager;
    
    /**
     * 
     * @return EntityManagerInterface
     */
    public function getEntityManager()
    {
        return $this->entityManager;
    }
    
    /**
     * 
     * @param EntityManagerInterface $entityManager
     * @return \Common\Wrapper\EntityManager
     */
    public function setEntityManager(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        return $this;
    }
}

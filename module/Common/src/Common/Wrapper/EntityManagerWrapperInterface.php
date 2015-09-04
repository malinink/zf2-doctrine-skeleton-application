<?php
/**
 * 
 * @author k.malinin
 */
namespace Common\Wrapper;

use Doctrine\ORM\EntityManagerInterface as DoctrineEntityManagerInterface;

interface EntityManagerWrapperInterface
{
    /**
     * 
     * @return DoctrineEntityManagerInterface
     */
    public function getEntityManager();
    
    /**
     * 
     * @param DoctrineEntityManagerInterface $entityManager 
     */
    public function setEntityManager(DoctrineEntityManagerInterface $entityManager);
}

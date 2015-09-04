<?php
/**
 * Getter and setter for Entity Manager
 * for ModelServiceManager purposes 
 * 
 * @author k.malinin
 */
namespace Common\Wrapper\Service\Common;

use Doctrine\ORM\EntityManagerInterface;

trait EntityManagerWrapper
{
    /**
     * 
     * @return EntityManagerInterface
     */
    public function getEntityManager()
    {
        if (is_null(($service = $this->getLocalCommonService('entity_manager')))) {
            return $this->getCommonServiceManager()->getEntityManager();
        }
        return $service;
    }
    
    /**
     * 
     * @param EntityManagerInterface $entityManager
     */
    public function setEntityManager(EntityManagerInterface $entityManager)
    {
        $this->setLocalCommonService('entity_manager', $entityManager);
        return $this;
    }
}

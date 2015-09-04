<?php
/**
 * Use that interface to include CSM into another objects
 * 
 * @author k.malinin
 */
namespace Common\Service\Manager;

use Common\Service\Manager\CommonServiceManagerInterface;

interface CommonServiceManagerAwareInterface
{
    /**
     * 
     * @return CommonServiceManagerInterface
     */
    public function getCommonServiceManager();
    
    /**
     * 
     * @param CommonServiceManagerInterface $commonServiceManager
     */
    public function setCommonServiceManager(CommonServiceManagerInterface $commonServiceManager);
}

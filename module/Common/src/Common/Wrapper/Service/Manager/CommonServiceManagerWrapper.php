<?php
/**
 * Getter and setter for CommonServiceManager
 * 
 * @author k.malinin
 */
namespace Common\Wrapper\Service\Manager;

use Common\Service\Manager\CommonServiceManagerInterface;

trait CommonServiceManagerWrapper
{
    /**
     * 
     * @return CommonServiceManagerInterface
     */
    public function getCommonServiceManager()
    {
        if (!isset($this->commonServiceManager)) {
            return null;
        }
        return $this->commonServiceManager;
    }
    
    /**
     * 
     * @param CommonServiceManagerInterface $commonServiceManager
     */
    public function setCommonServiceManager(CommonServiceManagerInterface $commonServiceManager)
    {
        $this->commonServiceManager = $commonServiceManager;
        return $this;
    }
    
    /**
     * 
     * @param string $commonServiceName
     * @return Object|null
     */
    public function getLocalCommonService($commonServiceName)
    {
        if (!isset($this->commonServiceManagerData) ||  is_null($this->commonServiceManagerData) || (!array_key_exists($commonServiceName, $this->commonServiceManagerData))) {
            return null;
        }
        
        return $this->commonServiceManagerData[$commonServiceName];
    }
    
    /**
     * 
     * @param string $commonServiceName
     * @param Object $modelService
     */
    public function setLocalCommonService($commonServiceName, $modelService)
    {
        if (!isset($this->commonServiceManagerData) || !is_array($this->commonServiceManagerData)) {
            $this->commonServiceManagerData = [];
        }
        
        $this->commonServiceManagerData[$commonServiceName] = $modelService;
        
        return $this;
    }
}

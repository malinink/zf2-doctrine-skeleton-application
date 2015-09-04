<?php
/**
 * Getter and setter for ModelServiceManager
 * 
 * @author k.malinin
 */
namespace Common\Wrapper\Service\Manager;

use Common\Service\Manager\ModelServiceManagerInterface;
use Common\Service\Model\Factory\ModelFactoryInterface;

trait ModelServiceManagerWrapper
{
    /**
     * 
     * @return ModelServiceManagerInterface
     */
    public function getModelServiceManager()
    {
        if (!isset($this->modelServiceManager)) {
            return null;
        }
        return $this->modelServiceManager;
    }
    
    /**
     * 
     * @param \Common\Manager\ModelServiceManager $model_service_manager
     */
    public function setModelServiceManager(ModelServiceManagerInterface $model_service_manager)
    {
        $this->modelServiceManager = $model_service_manager;
        return $this;
    }
    
    /**
     * 
     * @param string $modelServiceName
     * @return ModelFactoryInterface|null
     */
    public function getLocalModelService($modelServiceName)
    {
        if (!isset($this->modelServiceManagerData) || is_null($this->modelServiceManagerData) || (!array_key_exists($modelServiceName, $this->modelServiceManagerData))) {
            return null;
        }
        
        return $this->modelServiceManagerData[$modelServiceName];
    }
    
    /**
     * 
     * @param string $modelServiceName
     * @param ModelFactoryInterface $modelService
     */
    public function setLocalModelService($modelServiceName, ModelFactoryInterface $modelService)
    {
        if (!isset($this->modelServiceManagerData) || !is_array($this->modelServiceManagerData)) {
            $this->modelServiceManagerData = [];
        }
        
        $this->modelServiceManagerData[$modelServiceName] = $modelService;
        
        return $this;
    }
}

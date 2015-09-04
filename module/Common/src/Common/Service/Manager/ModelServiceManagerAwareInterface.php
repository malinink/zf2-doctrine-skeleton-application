<?php
/**
 * 
 * @author k.malinin
 */
namespace Common\Service\Manager;

use Common\Service\Manager\ModelServiceManagerInterface;

interface ModelServiceManagerAwareInterface
{
    /**
     * 
     * @return ModelServiceManagerInterface
     */
    public function getModelServiceManager();
    
    /**
     * 
     * @param ModelServiceManagerInterface $modelServiceManager
     */
    public function setModelServiceManager(ModelServiceManagerInterface $modelServiceManager);
}

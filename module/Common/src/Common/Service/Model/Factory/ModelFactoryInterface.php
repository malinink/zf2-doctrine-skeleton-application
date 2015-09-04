<?php
/**
 * 
 * @author k.malinin
 */
namespace Common\Service\Model\Factory;

use Common\Service\Manager\CommonServiceManagerAwareInterface;
use Common\Service\Manager\ModelServiceManagerAwareInterface;
use Common\Service\Model\Factory\ModelFactoryInterface;

interface ModelFactoryInterface
    extends CommonServiceManagerAwareInterface, ModelServiceManagerAwareInterface
{
    /**
     * 
     * @param string $commonServiceName
     * @return Object|null
     */
    public function getLocalCommonService($commonServiceName);
    
    /**
     * 
     * @param string $commonServiceName
     * @param Object $modelService
     */
    public function setLocalCommonService($commonServiceName, $modelService);
    
    /**
     * 
     * @param string $modelServiceName
     * @return ModelFactoryInterface|null
     */
    public function getLocalModelService($modelServiceName);
    
    /**
     * 
     * @param string $modelServiceName
     * @param ModelFactoryInterface $modelService
     */
    public function setLocalModelService($modelServiceName, ModelFactoryInterface $modelService);
}

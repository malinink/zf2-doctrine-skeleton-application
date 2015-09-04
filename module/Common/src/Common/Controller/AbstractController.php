<?php
/**
 * All controllers must extend AbstactController
 * 
 * @author k.malinin
 */
namespace Common\Controller;

use Exception;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\ModelInterface;
use Zend\View\Helper\HeadTitle;

abstract class AbstractController extends AbstractActionController
{
    /**
     *
     * @var ModelInterface 
     */
    protected $viewModel;
    
    /**
     *
     * @var \Zend\View\Helper\HeadTitle
     */
    protected $headTitle;
    
    /**
     * 
     * @return ModelInterface
     */
    public function getViewModel()
    {
        if (is_null($this->viewModel)) {
            $this->viewModel = new ViewModel();
        }
        return $this->viewModel;
    }

    /**
     * 
     * @param ModelInterface $viewModel
     * @return \Common\Controller\AbstractController
     */
    public function setViewModel(ModelInterface $viewModel)
    {
        $this->viewModel = $viewModel;
        return $this;
    }
    
    /**
     * 
     * @param HeadTitle $headTitle
     * @return \Common\Controller\AbstractController
     */
    public function setHeadTitle(HeadTitle $headTitle)
    {
        $this->headTitle = $headTitle;
        return $this;
    }
    /**
     * 
     * @return HeadTitle
     */
    public function getHeadTitle()
    {
        return $this->headTitle;
    }
    
    /**
     * 
     * @return \Zend\Http\PhpEnvironment\Response
     */
    public function getResponse()
    {
        return parent::getResponse();
    }
    
    /**
     * 
     * @return \Zend\Http\Request
     */
    public function getRequest()
    {
        return parent::getRequest();
    }
    
    /**
     * Do not use ServiceLocator in Controllers
     * 
     * @return null
     * @throws Exception
     */
    public function getServiceLocator()
    {
        throw new Exception('Do not use getServiceLocator in Controllers!');
    }
}

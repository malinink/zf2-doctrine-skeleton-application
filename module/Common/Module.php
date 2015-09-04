<?php
/**
 * 
 * @author k.malinin
 */
namespace Common;

use Locale;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Mvc\Controller\ControllerManager;
use Zend\Mvc\I18n\Translator;
use Zend\Validator\AbstractValidator;
use Common\Service\Manager\CommonServiceManagerAwareInterface;
use Common\Service\Manager\ModelServiceManagerAwareInterface;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $application = $e->getApplication();
        $serviceManager = $application->getServiceManager();
        $config = $serviceManager->get('config');
        /*
         * Attach route listener
         */
        $eventManager        = $application->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
        /*
         * Set locale, default translator, plural form
         */
        $translator = $serviceManager->get('translator');
        Locale::setDefault($translator->getLocale());
        AbstractValidator::setDefaultTranslator(new Translator($translator));
        $viewHelperManager = $serviceManager->get('ViewHelperManager');
        $pluralHelper = $viewHelperManager->get('Plural');
        $locale = explode('_', $translator->getLocale())[0];
        $pluralHelper->setPluralRule($config['translator']['plural_rules'][$locale]);
        /*
         * Handle errors
         */
        $eventManager->attach(MvcEvent::EVENT_DISPATCH_ERROR, array($this, 'handleError'));
        $eventManager->attach(MvcEvent::EVENT_RENDER_ERROR, array($this, 'handleError'));
    }

    public function handleError(MvcEvent $e)
    {
        $serviceManager = $e->getApplication()->getServiceManager();
        $serviceManager->get('Common\Logger')->crit($e->getParam('exception'));
        #$controllerName = $e->getParam('controller');
        #$viewModel = $e->getViewModel();
        #$viewModel->setVariables(array(
        #    'exception'  => $e->getParam('exception'),
        #    'controller' => $controllerName
        #));
        #$viewModel->setTemplate('error/dispatch.error.phtml');        
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return [
            'Zend\Loader\StandardAutoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ],
            ],
        ];
    }
    public function getServiceConfig()
    {
        return array(
            'factories' => [
            ],
            'initializers' => [
                function ($instance, $serviceManager) {
                    if (!is_object($instance)) {
                        return;
                    }
                    if ($instance instanceof CommonServiceManagerAwareInterface) {
                        $instance->setCommonServiceManager($serviceManager->get('Common\CommonServiceManager'));
                    }
                    if ($instance instanceof ModelServiceManagerAwareInterface) {
                        $instance->setModelServiceManager($serviceManager->get('Common\ModelServiceManager'));
                    }
                },
            ],
        );
    }

    public function getControllerConfig()
    {
        return [
            'initializers' => [
                function ($instance, ControllerManager $cm) {
                    /* @var $cm \Zend\Mvc\Controller\ControllerManager */
                    $serviceManager   = $cm->getServiceLocator();
                    if ($instance instanceof CommonServiceManagerAwareInterface) {
                        $instance->setCommonServiceManager($serviceManager->get('Common\CommonServiceManager'));
                    }
                    if ($instance instanceof ModelServiceManagerAwareInterface) {
                        $instance->setModelServiceManager($serviceManager->get('Common\ModelServiceManager'));
                    }
                },
            ],
        ];
    }
}

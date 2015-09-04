<?php
/**
 * 
 * @author k.malinin
 */
namespace Application\Controller;

use Common\Controller\AbstractController;

class IndexController extends AbstractController
{
    public function indexAction()
    {
        $viewModel = $this->getViewModel();
        return $viewModel;
    }
}

<?php
/**
 * That controller instead of AbstractController take CommonServiceManager after creation
 * We should use that kind of controllers for cron routes
 * 
 * @author k.malinin
 */
namespace Common\Controller;

use Common\Service\Manager\CommonServiceManagerAwareInterface;
use Common\Wrapper\Service\Manager\CommonServiceManagerWrapper;

abstract class AbstractCronController extends AbstractController
    implements CommonServiceManagerAwareInterface
{
    use CommonServiceManagerWrapper;
}

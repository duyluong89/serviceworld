<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Catalog;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Catalog\Model\Category;
use Catalog\Model\CategoryTable;
use Catalog\Model\Product;
use Catalog\Model\ProductTable;


class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $e->getApplication()->getServiceManager()->get('translator');
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    
    public function getServiceConfig()
    {
    	return array(
    			'factories' => array(
    					'Catalog\Model\CategoryTable' =>  function($sm) {
    						$tableGateway = $sm->get('CategoryTableGateway');
    						$table = new CategoryTable($tableGateway);
    						return $table;
    					},
    					'Catalog\Model\ProductTable' =>  function($sm) {
    						$tableGateway = $sm->get('ProductTableGateway');
    						$table = new ProductTable($tableGateway);
    						return $table;
    					},
    					'CategoryTableGateway' => function ($sm) {
    						$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
    						$resultSetPrototype = new ResultSet();
    						$resultSetPrototype->setArrayObjectPrototype(new Category());
    						return new TableGateway('category', $dbAdapter, null, $resultSetPrototype);
    					},
    					'ProductTableGateway' => function ($sm) {
    						$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
    						$resultSetPrototype = new ResultSet();
    						$resultSetPrototype->setArrayObjectPrototype(new Product());
    						return new TableGateway('product', $dbAdapter, null, $resultSetPrototype);
    					},
    			),
    	);
    }
}

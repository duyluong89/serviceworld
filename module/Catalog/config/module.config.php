<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'router' => array(
        'routes' => array(
            'catalog' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/catalog',
                    'defaults' => array(
                        'controller' => 'Catalog\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /application/:controller/:action
            'catalog' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/catalog',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Catalog\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action[/:id]]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id'         => '[0-9]+',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                   
                    
                ),
                
            ),
            'category' => array(
            		'type'    => 'Literal',
            		'options' => array(
            				'route'    => '/catalog',
            				'defaults' => array(
            						'__NAMESPACE__' => 'Catalog\Controller',
            						'controller'    => 'Category',
            						'action'        => 'index',
            				),
            		),
            		'may_terminate' => true,
            		'child_routes' => array(
            				'default' => array(
            						'type'    => 'Segment',
            						'options' => array(
            								'route'    => '/[:controller[/:action[/:id]]]',
            								'constraints' => array(
            										'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
            										'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
            										'id'         => '[0-9]+',
            								),
            								'defaults' => array(
            								),
            						),
            				),
            				 
            
            		),
            
            ),
            
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Catalog\Controller\Index' => 'Catalog\Controller\IndexController',
            'Catalog\Controller\Category' => 'Catalog\Controller\CategoryController',
        ),
    ),
    'view_manager' => array(
        'template_map' => array(
            'catalog/index/index' => __DIR__ . '/../view/catalog/index/index.phtml',
            'catalog/category/index' => __DIR__ . '/../view/catalog/category/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);

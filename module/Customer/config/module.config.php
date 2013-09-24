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
            'customer' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/customer',
                    'defaults' => array(
                        'controller' => 'Customer\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /application/:controller/:action
            'customer' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/customer',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Customer\Controller',
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
                    'login' => array(
                    		'type'    => 'Segment',
                    		'options' => array(
                    				'route'    => '/login',
                    				'constraints' => array(
                    						'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    						'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                    				),
                    				'defaults' => array(
                    				    '__NAMESPACE__' => 'Customer\Controller',
                    				    'controller' =>'Login',
                    				    'action'=>'doLogin',
                    				),
                    		),
                    ),
                    
                ),
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Customer\Controller\Index' => 'Customer\Controller\IndexController',
            'Customer\Controller\Login' => 'Customer\Controller\LoginController'
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'template_map' => array(
            'customer/index/index' => __DIR__ . '/../view/customer/index/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);

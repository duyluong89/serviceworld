<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Customer\Controller;

use Zend\View\Model\ViewModel;
use ServiceLibrary\Controller\ServiceController;

class IndexController extends ServiceController
{
    //protected $collection;
    function __construct(){
    	parent::__construct();
    	$this->setModel('Customer\Model\CustomerTable');
    }
    public function indexAction()
    {
        $data = $this->getCollection()->getAll();
        return new ViewModel(array('data'=>$data));
    }
    
    function testAction(){
        return new ViewModel();
    }
}

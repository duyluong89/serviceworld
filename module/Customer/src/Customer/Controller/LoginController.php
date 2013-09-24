<?php
namespace Customer\Controller;
use ServiceLibrary\Controller\ServiceController;
use Zend\View\Helper\ViewModel;

class LoginController extends ServiceController
{
    function __construct(){
    	parent::__construct();
    	$this->setModel('Customer\Model\CustomerTable');
    }
    
	public function doLoginAction(){
        if($this->getRequest()->isPost()){
            $username = $this->getRequest()->getPost('username');
            $password = $this->getRequest()->getPost('password');
            
        }
	    return new ViewModel();
	}
}
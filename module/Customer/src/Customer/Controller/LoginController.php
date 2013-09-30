<?php
namespace Customer\Controller;
use ServiceLibrary\Controller\ServiceController;
use Zend\Session\Container;
class LoginController extends ServiceController
{
    function __construct(){
    	parent::__construct();
    	$this->setModel('Customer\Model\CustomerTable');
    }
    
	public function doLoginAction(){
        if($this->getRequest()->isPost()){
            $response = $this->getResponse();
            $request = $this->getRequest();
            $username = $this->getRequest()->getPost('username');
            $password = $this->getRequest()->getPost('password');
            if(!is_null($username) && !is_null($password)){
                $user = $this->getCollection()->checkLogin($username,$password);
                if($user !== false){
                   $user_session = new Container('user');
                   $user_session->logined = $user;
                   $response->setContent(json_encode(array('response' => true, 'user' => $user)));
                }else{
                    $response->setContent(json_encode(array('response' => false)));
                }	
            }else{
            	$response->setContent(json_encode(array('response' => $username)));
            }
            
            
        }
	    return $response;
	    
	}
}
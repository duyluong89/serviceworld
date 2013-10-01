<?php
namespace Customer\Controller;
use ServiceLibrary\Controller\ServiceController;


class RegisterController extends ServiceController
{
    protected $form;
    protected $validate;
    
    function __construct(){
    	parent::__construct();
    	$this->setModel('Customer\Model\CustomerTable');
    	$this->form = new \Customer\Form\AddUsers();
    	$this->validate = new \Customer\Model\FilterCustomer();
    }
    
	public function registerAction(){
	    if($this->getRequest()->isPost()){
	        $this->form->setInputFilter($this->validate->getInputFilter());
	        $this->form->setData($this->getRequest()->getPost());
	        if ($this->form->isValid()) {
	        	$data = array(
	        			'username'=>$this->getRequest()->getPost("username"),
	        			'password'=>$this->getCollection()->encrytPassword($this->getRequest()->getPost('password')),
	        			'firstName'=>$this->getRequest()->getPost('firsName'),
	        			'lastName'=>$this->getRequest()->getPost('lastName'),
	        			'gender'=>$this->getRequest()->getPost('gender'),
	        			'birthday'=>$this->getRequest()->getPost('birthday'),
	        			'address'=>$this->getRequest()->getPost('address'),
	        			'email'=>$this->getRequest()->getPost('email'),
	        			'phoneNumber'=>$this->getRequest()->getPost('phoneNumber'),
	        			'companyName'=>$this->getRequest()->getPost('companyName'),
	        			'companyAddress'=>$this->getRequest()->getPost('companyAddress'),
	        			'companyPhone'=>$this->getRequest()->getPost('companyPhone'),
	        			'dateCreate'=>time(),
	        			'lastVisit'=>time(),
	        			'privilege'=>$this->getRequest()->getPost('privilege'),
	        			'state'=>$this->getRequest()->getPost('state'),
	        	);
	        	$this->getCollection()->save($data);
	        	$this->redirect()->toRoute('customer');
	        }
	    }    
	    return array('form'=>$this->form);
	}
}
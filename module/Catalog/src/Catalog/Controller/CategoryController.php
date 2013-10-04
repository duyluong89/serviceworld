<?php
namespace Catalog\Controller;

use ServiceLibrary\Controller\ServiceController;
use Catalog\Form\CategoryForm;
use Zend\Session\Container;

class CategoryController extends ServiceController{
    
    protected $form;
    protected $validation;
    protected $session_user;
    public function __construct(){
        parent::__construct();
        $this->form = new CategoryForm('category');
        $this->session_user = new Container('user');
        $this->setModel('Catalog\Model\CategoryTable');
    }

    function indexAction(){
        
      
    }
    
    public function addAction(){
        
        $this->form->get('parent')->setOptions(array('value_options'=>$this->getCollection()->getParent()));
        $this->form->get('createdBy')->setValue($this->session_user->logined->userName);
        if($this->getRequest()->isPost()){
            $data = $this->getRequest()->getPost()->toArray();
            unset($data['addCategory']);
            unset($data['id']);
            $data['parent'] = ((string)$data['parent']=="") ? 0 : $data['parent'];
           // var_dump($data); die();
           
           if($this->getCollection()->save($data) != false){
           	$this->redirect()->toRoute('category');
           }   
        }
        return array('form'=>$this->form);
    }
    
    public function editAction(){
        
    }
    
    public function deleteAction(){
        
    }
    
    
    
    
    
}
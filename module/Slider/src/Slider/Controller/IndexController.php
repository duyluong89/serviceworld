<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Slider\Controller;

use Zend\View\Model\ViewModel;
use ServiceLibrary\Controller\ServiceController;
use Slider\Form\AddSlider;
use Zend\Validator\File\Size;
use Slider\Model\FilterSlider;

class IndexController extends ServiceController
{
    protected $form;
    protected $validate;
    public function __construct(){
        parent::__construct();
        $this->setModel('Slider\Model\SliderTable');
        $this->form = new AddSlider();
        $this->validate = new FilterSlider();
        
    }
    public function indexAction()
    {
        $data = $this->getCollection()->getAll();
        return new ViewModel(array('data'=>$data));
    }
    
    public function addAction(){
         if($this->getRequest()->isPost()){
           $this->form->setInputFilter($this->validate->getInputFilter());
            $this->form->setData($this->getRequest()->getPost());
            if ($this->form->isValid()) {
                $files = $this->params()->fromFiles('image');
            	$size = new Size(array('max'=>2000000)); //minimum bytes filesize
            	$adapter = new \Zend\File\Transfer\Adapter\Http();
            	$adapter->setValidators(array($size), $files['name']);
            	if (!$adapter->isValid()){ 
            	    $dataError = $adapter->getMessages();
            		$error = array();
            		foreach($dataError as $key=>$row)
            		{
            			$error[] = $row;
            		}
            		$this->form->setMessages(array('image'=>$error ));
            	} else {
            	    $adapter->setDestination('./public/uploads/sliders');
            		if ($adapter->receive($files['name'])) {
            		  $this->validate->exchangeArray($this->form->getData());
            		  $post = array_merge($this->getRequest()->getPost()->toArray(),array('image'=>$files['name']));
            		  unset($post['addSlider']);
            		  if($this->getCollection()->save($post) !== false){
            		      $this->redirect()->toRoute('slider');
            		  }else{
            		      $this->form->setMessages(array('error'=>"can not insert" ));
            		  }
            		}else{
            		    $this->form->setMessages(array('error'=>"can not upload file" ));
            		}
            	}
            }
           
    }
        return new ViewModel(array('form'=>$this->form));
    }
    
    public function editAction(){
        $id = $this->params('id');
        $data = $this->getCollection()->getById($id);
        if($this->getRequest()->isPost()){
                
        }
        return new ViewModel(array('form'=>$this->form, 'slider'=>''));
    }
    
    
}

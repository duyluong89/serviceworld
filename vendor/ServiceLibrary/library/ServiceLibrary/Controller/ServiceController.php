<?php
namespace ServiceLibrary\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
class ServiceController extends AbstractActionController{
   protected $collection;
   protected $model;
   public function __construct(){ }
   
   public function test(){
       
   	return new ViewModel();
   }
   public function getCollection()
   {
   	if (!$this->collection) {
   	    $model = $this->getModel();
   		$sm = $this->getServiceLocator();
   		$this->collection = $sm->get($model);
   	}
   	return $this->collection;
   }
   
   function getModel(){
   	return $this->model;
   }
   function setModel($_model){
       $this->model = $_model;
   }
}
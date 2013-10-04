<?php
namespace Catalog\Form;

use Zend\Form\Form;
class CategoryForm extends Form{
    
    protected $session_user;
    public function __construct($name){
        parent::__construct($name);
        $this->addElementForm();
       
    }
    
    protected function addElementForm(){
        $this->setAttribute("Method", "POST");
        $this->add(array(
        		'name'=>'id',
        		'attributes'=>array(
        				'type'=>'hidden'
        		)
        			
        ));
        $this->add(array(
        		'name'=>'name',
                'type'=>'text',
                'attributes'=>array(
                    'class'=> 'text',
                ),
        		'options'=>array(
                    'label'=>_('Name')
        		)
                
        		 
        ));
        
        $this->add(array(
            'name'=>'parent',
            'type'=> 'Select',
            'options'=>array(
                'label'=>_('Parent'),
                'allow_add'=>true,
                'empty_option'=>_('Choose parent'),
        ),
        ));
        
        $this->add(array(
            'name'=>'description',
            'type'=>'textarea',
            'attributes'=>array(
                
            ),
            'options'=>array(
                'label'=>_('Description'),
            ),
        ));
        
        $this->add(array(
        		'name'=>'styleClass',
        		'type'=>'text',
        		'attributes'=>array(
        
        		),
        		'options'=>array(
        				'label'=>_('Style Class'),
        		),
        ));
        
        $this->add(array(
        		'name'=>'order',
        		'type'=>'number',
        		'attributes'=>array(
        
        		),
        		'options'=>array(
        				'label'=>_('Sort Order'),
        		),
        ));
        
        $this->add(array(
        		'name'=>'createdDate',
        		'type'=>'hidden',
        		'attributes'=>array(
                    'value'=>time()
        		),
        ));
        $this->add(array(
        		'name'=>'createdBy',
        		'type'=>'hidden',
        		'attributes'=>array(
                    'value'=>''
        		),
        		
        ));
        
        
        $this->add(array(
        		'name'=>'state',
                'type'=>'checkbox',
        		'options'=>array(
                    'label'=>_('State')
        		)
                
        ));
         
        $this->add(array(
        		'name'=>'addCategory',
        		'attributes'=>array(
        				'type'=>'submit',
        				'value'=>"Register",
        				'class'=>"btn btn-success"
        		)
        ));
    }
}
<?php
namespace Slider\Form;

use Zend\Form\Form;
use Zend\Form\Element;

class AddSlider extends Form{
    public function __construct ($name = null, $option = null)
    {
    	parent::__construct($name, $option);
    	$this->addInputFilter();
    	$this->addElements();
    }
    
    public function addElements ()
    {
    	// File Input
    	$file = new Element\File('image');
    	$file->setLabel('Avatar Image Upload')->setAttribute('id', 'image');
    	$this->add($file);
    }
    
    public function addInputFilter ()
    {
    	$this->setAttribute("Method", "POST");
    	$this->setAttribute('enctype','multipart/form-data');
    	$this->add(array(
    			'name' => 'title',
    			'attributes' => array(
    					'type' => 'text'
    			)
    	)
    	);
    	$this->add(array(
    			'name' => 'image',
    			'attributes' => array(
    					'type' => 'file'
    			)
    			,
    			'options' => array(
    					'label' => "Image"
    			)
    	));
    	$this->add(array(
    			'name' => 'description',
    			'attributes' => array(
    					'type' => 'textarea',
    					'class' => 'text required'
    			)
    	));
    	$this->add(array(
    			'name' => 'url',
    			'attributes' => array(
    					'type' => 'text'
    			)
    	));
    
    	$this->add(array(
    			'name' => 'order',
    			'attributes' => array(
    					'type' => 'text'
    			)
    	));
    	$this->add(array(
    			'name' => 'state',
    			'type' => 'Select',
    			'options' => array(
    					'empty_option' => 'Please choose your state',
    					'value_options' => array(
    							'1' => 'Active',
    							'0' => 'DeActive'
    					)
    			)
    
    	));
    
    	$this->add(array(
    			'name' => 'addSlider',
    			'attributes' => array(
    					'type' => 'submit',
    					'value' => "Save",
    					'class' => "btn"
    			)
    	));
    }
}
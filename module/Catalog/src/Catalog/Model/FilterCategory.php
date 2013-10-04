<?php
namespace Catalog\Model;
use Zend\InputFilter\Factory as InputFactory;     // <-- Add this import
use Zend\InputFilter\InputFilter;                 // <-- Add this import
use Zend\InputFilter\InputFilterAwareInterface;   // <-- Add this import
use Zend\InputFilter\InputFilterInterface;        // <-- Add this import

class FilterCategory implements InputFilterAwareInterface
{
    protected $inputFilter;
	/* (non-PHPdoc)
	 * @see \Zend\InputFilter\InputFilterAwareInterface::setInputFilter()
	 */
	public function setInputFilter(\Zend\InputFilter\InputFilterInterface $inputFilter) {
		// TODO Auto-generated method stub
		
	}

	/* (non-PHPdoc)
	 * @see \Zend\InputFilter\InputFilterAwareInterface::getInputFilter()
	 */
	public function getInputFilter() {
		if (!$this->inputFilter) {
			$inputFilter = new InputFilter();
			$factory     = new InputFactory();
			
		}
		
	}

    
}
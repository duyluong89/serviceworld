<?php
namespace ServiceLibrary\Model;
use Zend\Db\TableGateway\TableGateway;

class ServiceModel{
    protected $tableGateway;
    
    public function __construct(TableGateway $tableGateway){
    	$this->tableGateway = $tableGateway;
    }
    public function getAll(){
    	$resultSet = $this->tableGateway->select();
    	return $resultSet;
    }
    public function getById($id)
    {
    	$id  = (int) $id;
    	$rowset = $this->tableGateway->select(array('id' => $id));
    	$row = $rowset->current();
    	if (!$row) {
    		throw new \Exception("Could not find row $id");
    	}
    	return $row;
    }
    
    public function save($data) {
    	if(!isset($data['id'])){
    	      if(!$this->tableGateway->insert($data))
    	          return false;
    	         return $this->tableGateway->getLastInsertValue();
    	}else{
    		$id = (int)$data['id'];
    		if (!$this->tableGateway->update($data, array('id' => $id)))
    			return false;
    		return $id;
    	}
        return false;
    }
    
    public function delete($id)
    {
    	$this->tableGateway->delete(array('id' => $id));
    }
}
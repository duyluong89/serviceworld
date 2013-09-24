<?php
namespace Customer\Model;
use ServiceLibrary\Model\ServiceModel;

class CustomerTable extends ServiceModel{
    
    public function checkExistUserName($userName){
        $rowset = $this->tableGateway->select(array('userName' => $userName));
        $row = $rowset->current();
        if (!$row) {
        	return false;
        }
        return true;
    }
    public function checkLogin($userName,$password){
        $password = $this->encrytPassword($password);
        $rowset = $this->tableGateway->select(array('userName' => $userName, 'password'=>$password, 'state'=>1));
        $row = $rowset->current();
        if (!$row) {
        	return false;
        }
        return $row;
    }
    public function encrytPassword($password){
    	return md5($password);
    }
}
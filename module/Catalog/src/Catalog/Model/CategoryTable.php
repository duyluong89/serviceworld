<?php
namespace Catalog\Model;

use ServiceLibrary\Model\ServiceModel;
class CategoryTable extends ServiceModel{
    
    public function getParent(){
        $catParent = $this->tableGateway->select(array('parent'=>0));
         $arrData = array();
         foreach ($catParent as $key=>$cat){
            
             $arrData[$cat->id] = $cat->name;
             $this->getChild($cat->id,$arrData, "-");
             
         }
         return $arrData;
    }
    
    public function getChild($parentId,&$data,$prefix){
        $catChild = $this->tableGateway->select(array('parent'=>$parentId));
        foreach ($catChild as $key=>$cat){
            $data[$cat->id] = $prefix . ' '. $cat->name;
            $prefix = '-'. $prefix;
            $this->getChild($cat->id,$data,$prefix);
        }
        return $data;
    }
}
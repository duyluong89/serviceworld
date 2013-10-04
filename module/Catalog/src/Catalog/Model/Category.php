<?php
namespace Catalog\Model;

class Category{
    public $id;
    public $name;
    public $parent;
    public $description;
    public $styleClass;
    public $order;
    public $createDate;
    public $createBy;
    public $state;
    
    public function exchangeArray($data){
        $this->id = isset($data['id']) ? $data['id'] : null;
        $this->name = isset($data['name']) ? $data['name'] : null;
        $this->parent = isset($data['parent']) ? $data['parent'] : 0;
        $this->description = isset($data['description']) ? $data['description'] : null;
        $this->styleClass = isset($data['styleClass']) ? $data['styleClass'] : null;
        $this->order = isset($data['order']) ? $data['order'] : null;
        $this->createDate = isset($data['createDate']) ? $data['createDate'] : time();
        $this->createBy = isset($data['createBy']) ? $data['createBy'] : null;
        $this->state = isset($data['state']) ? $data['state'] : 0;
    }
}
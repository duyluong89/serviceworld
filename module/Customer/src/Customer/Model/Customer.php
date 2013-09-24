<?php
namespace Customer\Model;
class Customer{
    public $id;
    public $title;
    public $image;
    public $description;
    public $url;
    public $order;
    public $state;
    
    public function exchangeArray($data){
        $this->id = (isset($data['id'])) ? $data['id']:0;
        $this->title = (isset($data['title'])) ? $data['title']:null;
        $this->image = (isset($data['image'])) ? $data['image']:null;
        $this->description = (isset($data['description'])) ? $data['description']:null;
        $this->url = (isset($data['url'])) ? $data['url']:null;
        $this->order = (isset($data['order'])) ? $data['order']:0;
        $this->state = (isset($data['state'])) ? $data['state']:0;
    }
}
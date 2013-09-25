<?php
namespace Customer\Model;
class Customer{
    public $id;
    public $userName;
    public $password;
    public $firstName;
    public $lastName;
    public $gender;
    public $birthday;
    public $address;
    public $email;
    public $phoneNumber;
    public $companyName;
    public $companyAddress;
    public $companyPhone;
    public $dateCreate;
    public $lastVisit;
    public $privilege;
    public $state;
    
    public function exchangeArray($data){
        $this->id = (isset($data['id'])) ? $data['id']:0;
        $this->userName = (isset($data['userName'])) ? $data['userName']:null;
        $this->password = (isset($data['password'])) ? $data['password']:null;
        $this->firstName = (isset($data['firstName'])) ? $data['firstName']:null;
        $this->lastName = (isset($data['lastName'])) ? $data['lastName']:null;
        $this->gender = (isset($data['gender'])) ? $data['gender']:0;
        $this->birthday = (isset($data['birthday'])) ? $data['birthday']:null;
        $this->address = (isset($data['address'])) ? $data['address']:null;
        $this->email = (isset($data['email'])) ? $data['email']:null;
        $this->phoneNumber = (isset($data['phoneNumber'])) ? $data['phoneNumber']:null;
        $this->companyName = (isset($data['companyName'])) ? $data['companyName']:null;
        $this->companyAddress = (isset($data['companyAddress'])) ? $data['companyAddress']:null;
        $this->companyPhone = (isset($data['companyPhone'])) ? $data['companyPhone']:null;
        $this->dateCreate = (isset($data['dateCreate'])) ? $data['dateCreate']:time();
        $this->lastVisit = (isset($data['lastVisit'])) ? $data['lastVisit']:time();
        $this->privilege = (isset($data['privilege'])) ? $data['privilege']:100;
        $this->state = (isset($data['state'])) ? $data['state']:0;
    }
}
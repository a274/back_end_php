<?php
class User
{
    public $name_;
    public $surname;
    public $email;
    public $password_;
    public $phonenumber;
    public $address;

    public function __construct($name_, $surname, $email, $password_, $phonenumber, $address)
    {
        $this->$name_ = $name_;
        $this->$surname = $surname;
        $this->$email = $email;
        $this->$password_ = $password_;
        $this->$phonenumber = $phonenumber;
        $this->$address = $address;
    }
}

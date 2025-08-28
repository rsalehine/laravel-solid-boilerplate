<?php

namespace App\DTOs;

class UserRegisterDTO{
    public function __construct(public $name=null,public $email,public $password){}
}
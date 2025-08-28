<?php

namespace App\Contracts;

use App\DTOs\UserRegisterDTO;

interface UserRepositoryInterface{

    public function findByEmail(string $email);

    public function create(UserRegisterDTO $data);
}
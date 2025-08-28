<?php

namespace App\Services\User;

use App\DTOs\UserRegisterDTO;
use App\Exceptions\AppException;
use App\Contracts\UserRepositoryInterface;

class AuthService{

    public function __construct(private UserRepositoryInterface $userRepository){}

    public function register(UserRegisterDTO $data)
    {

        // We could also check this in validation, but here we do it in the service for learning purposes.
        if($this->userRepository->findByEmail($data->email)){
            throw new AppException(config('messages.email_exists'));
        }

        //other logics

        return $this->userRepository->create($data);

    }
}

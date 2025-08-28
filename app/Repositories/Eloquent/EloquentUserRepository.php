<?php

namespace App\Repositories\Eloquent;

use App\Exceptions\AppException;
use App\Models\User;
use App\Contracts\UserRepositoryInterface;
use Exception;

class EloquentUserRepository implements UserRepositoryInterface
{
    public function findByEmail(string $email)
    {
        try {
            return User::where('email', $email)->first();
        } catch (Exception $e) {
            throw new AppException(config('messages.db_failed'));
        }
    }

    public function create(\App\DTOs\UserRegisterDTO $data)
    {
        try {
            return User::create([
                'name' => $data->name,
                'email' => $data->email,
                'password' => $data->password
            ]);
        } catch (Exception $e) {
            throw new AppException(config('messages.db_failed'));
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\DTOs\UserRegisterDTO;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Resources\UserResource;
use App\Services\User\AuthService;
use App\Utils\ApiResponser;


class UserController extends Controller
{
    public function __construct(private AuthService $authService){}

    public function register(RegisterUserRequest $request)
    {
        //prepare data object
        $data=new UserRegisterDTO(name:$request->name,email: $request->email,password:bcrypt($request->password));

        //use service
        $user=$this->authService->register($data);

        //transform data
        $user=new UserResource($user);

        //return response
        return ApiResponser::success($user);

    }
}

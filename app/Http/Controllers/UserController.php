<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Resources\User\CreateUserResource;
use App\Services\UserService;


class UserController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $user = UserService::createUser($data);
        return new CreateUserResource($user);
    }
}

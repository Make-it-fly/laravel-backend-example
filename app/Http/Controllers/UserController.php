<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\CreateUserRequest;
use App\Services\User\CreateUserService;
use App\Services\User\GetAllUsersService;
use Illuminate\Http\Request;

class UserController extends Controller {
    public function create(CreateUserRequest $request){
        return CreateUserService::execute($request->all());
    }
    public function getAll(Request $request){
        return GetAllUsersService::execute();
    }
}
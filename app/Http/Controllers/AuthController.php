<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Services\Auth\LoginService;
use Illuminate\Http\Request;

class AuthController extends Controller {
    public function login(LoginRequest $request){
        $credentials = $request->all();
        $loginService = new LoginService();
        return $loginService->execute([
            'email' => $credentials['email'], 
            'password' => $credentials['password']
        ]);
    }
}

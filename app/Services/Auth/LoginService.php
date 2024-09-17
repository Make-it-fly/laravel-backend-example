<?php

namespace App\Services\Auth;

use App\Exceptions\AppError;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class LoginService {
    public function execute(array $credentials){
        Log::debug('Service Login');

        if (!$token = auth()->claims(['isAdmin' => 0])->attempt($credentials)) {
           throw new AppError('Email ou senha incorretos', 401);
        }
        Log::debug('Success');
        return $this->responseToken($token);
    }

    private function responseToken($token){
        return response()->json([
            'token' => $token,
            'user' => auth()->user()
        ]);
    }
}
<?php

namespace App\Services\User;

use App\Exceptions\AppError;
use App\Models\User;
use Error;
use Illuminate\Support\Facades\Log;

class CreateUserService {
    static function execute(array $data){
        Log::debug('Service Create User');
        $userFound = User::firstWhere('email', $data['email']);

        if(!is_null($userFound)){
            throw new AppError('Email já cadastrado', 400);
        }
        
        Log::debug('Success');
        return User::create($data);
    }
}
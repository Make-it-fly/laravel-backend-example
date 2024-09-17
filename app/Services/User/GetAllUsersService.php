<?php

namespace App\Services\User;

use App\Exceptions\AppError;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class GetAllUsersService {
    static function execute(){
        $users = User::all();
        return $users;
    }
}
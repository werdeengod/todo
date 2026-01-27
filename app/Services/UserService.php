<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\DTO\CreateUserDTO;

class UserService
{
    public function store(CreateUserDTO $data): User
    {
        // Выносим логику создания в сервис для будущего расширения
        
        $user = User::create([
            'login' => $data->login,
            'password' => Hash::make($data->password)
        ]);

        return $user;
    }
}
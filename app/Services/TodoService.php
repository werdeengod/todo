<?php

namespace App\Services;

use App\Models\Todo;

class TodoService
{
    public function store(string $title, int $userId): Todo 
    {
        // Выносим логику создания в сервис для будущего расширения

        return Todo::create([
            'title' => $title,
            'user_id' => $userId
        ]);
    }
}
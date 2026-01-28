<?php

namespace App\Services;

use App\Models\Todo;
use App\DTO\CreateTaskDTO;

class TaskService
{
    public function store(CreateTaskDTO $data): Todo 
    {
        // Выносим логику создания в сервис для будущего расширения

        return Todo::create([
            'title' => $data->title,
            'user_id' => $data->userId
        ]);
    }
}
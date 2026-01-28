<?php

namespace App\DTO;

class CreateTaskDTO
{
    public function __construct(
        public readonly string $title,
        public readonly int $userId
    ) {}
}
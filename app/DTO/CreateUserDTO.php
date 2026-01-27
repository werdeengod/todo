<?php

namespace App\DTO;

class CreateUserDTO
{
    public function __construct(
        public readonly string $login,
        public readonly string $password
    ) {}
}
<?php

namespace App\Http\Requests\Concerns;

trait HasBaseCredentialsRules
{
    protected function loginRules(): array
    {
        return [
            'required',
            'string',
            'min:3',
            'max:50',
            'regex:/^[a-zA-Z0-9_]+$/'
        ];
    }

    protected function passwordRules(): array
    {
        return [
            'required',
            'string',
            'min:8',
            'max:255'
        ];
    }
}
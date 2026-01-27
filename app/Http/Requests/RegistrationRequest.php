<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Concerns\HasBaseCredentialsRules;
use App\DTO\CreateUserDTO;

class RegistrationRequest extends FormRequest
{
    use HasBaseCredentialsRules;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {   
        return [
            'login' => [
                ...$this->loginRules(),
                'unique:users,login'
            ],
            'password' => [
                ...$this->passwordRules(),
                'confirmed'
            ]
        ]; 
    }

    public function toDTO(): CreateUserDTO
    {
        $data = $this->validated();

        return new CreateUserDTO(
            login: $data['login'],
            password: $data['password']
        );
    }
}

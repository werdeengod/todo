<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Concerns\HasBaseCredentialsRules;

class LoginRequest extends FormRequest
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
            'login' => $this->loginRules(),
            'password' => $this->passwordRules()
        ];
    }

    public function credentials(): array
    {
        return $this->only(['login', 'password']);
    }
}

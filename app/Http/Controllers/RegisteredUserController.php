<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegistrationRequest;
use App\Services\UserService;

class RegisteredUserController extends Controller
{
    public function __construct(
        private UserService $userService
    ) {}

    public function create() 
    {
        return view('auth.register');
    }

    public function store(RegistrationRequest $request) 
    {
        $user = $this->userService->store($request->toDTO());
        Auth::login($user);

        return redirect()->intended(route('todos.index'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegistrationRequest;
use App\Services\UserService;

class RegisteredUserController extends Controller
{
    public function __construct(
        private UserService $userService
    ) {}

    public function create(): View 
    {
        return view('auth.register');
    }

    public function store(RegistrationRequest $request): RedirectResponse 
    {
        $user = $this->userService->store($request->toDTO());
        Auth::login($user);

        return redirect()->intended(route('todos.index'));
    }
}

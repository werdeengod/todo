<?php

namespace App\Http\Controllers;


use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    public function create(): View 
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request): RedirectResponse 
    {
        if (!Auth::attempt($request->credentials())) {
            return back()->withErrors(['error' => 'Invalid credentials']);
        }

        $request->session()->regenerate();
        return redirect()->intended(route('todos.index'));
    }

    public function destroy(Request $request): RedirectResponse 
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login'); 
    }
}

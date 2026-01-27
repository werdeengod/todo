<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    public function create() 
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request) 
    {
        if (!Auth::attempt($request->credentials())) {
            return back();
        }

        $request->session()->regenerate();
        return redirect()->intended(route('todos.index'));
    }

    public function destroy(Request $request) 
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login'); 
    }
}

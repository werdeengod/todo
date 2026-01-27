<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ AuthenticatedSessionController, RegisteredUserController };
use App\Http\Controllers\TodoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('guest')->group(function () {
    Route::prefix('/login')->group(function () {
        Route::get('/', [AuthenticatedSessionController::class, 'create'])
            ->name('login');

        Route::post('/', [AuthenticatedSessionController::class, 'store'])
            ->name('login.store');
    });

    Route::prefix('/register')->group(function () {
        Route::get('/', [RegisteredUserController::class, 'create'])
            ->name('register');
        Route::post('/', [RegisteredUserController::class, 'store'])
            ->name('register.store');
    });
});

Route::middleware('auth')->group(function () {
    Route::delete('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    Route::resource('/todos', TodoController::class)
        ->only('index', 'store', 'destroy')
        ->names([
            'index' => 'todos.index',
            'store' => 'todos.store',
            'destroy' => 'todos.destroy'
        ]);
});
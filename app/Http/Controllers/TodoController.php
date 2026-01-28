<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Todo;
use App\Services\TodoService;
use App\Http\Requests\CreateTodoRequest;

class TodoController extends Controller
{
    public function __construct(
        private TodoService $todoService
    ) {}

    public function index(): View 
    {
        $todos = Auth::user()->todos()->get();
        return view('todo', ['todos' => $todos]);
    }

    public function store(CreateTodoRequest $request): RedirectResponse 
    {   
        $this->todoService->store(
            $request->get('title'), 
            Auth::id()
        );
        
        return redirect()->route('todos.index');
    }

    public function destroy(Todo $todo): RedirectResponse 
    {
        $this->authorize('delete', $todo);
        $todo->delete();

        return redirect()->route('todos.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateTodoRequest;
use App\Models\Todo;
use App\Services\TodoService;

class TodoController extends Controller
{
    public function __construct(
        private TodoService $todoService
    ) {}

    public function index() 
    {
        $todos = Auth::user()->todos()->get();
        return view('todo', ['todos' => $todos]);
    }

    public function store(CreateTodoRequest $request) 
    {   
        $this->todoService->store(
            $request->get('title'), 
            Auth::id()
        );
        
        return redirect()->route('todos.index');
    }

    public function destroy(Todo $todo) 
    {
        $this->authorize('delete', $todo);
        $todo->delete();

        return redirect()->route('todos.index');
    }
}

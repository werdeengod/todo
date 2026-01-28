<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Todo;
use App\Services\TaskService;
use App\Http\Requests\CreateTaskRequest;

class TaskController extends Controller
{
    public function __construct(
        private TaskService $todoService
    ) {}

    public function index(): View 
    {
        $todos = Auth::user()->todos()->get();
        return view('todo', ['todos' => $todos]);
    }

    public function store(CreateTaskRequest $request): RedirectResponse 
    {   
        $this->todoService->store($request->toDTO());
        return redirect()->route('todos.index');
    }

    public function destroy(Todo $todo): RedirectResponse 
    {
        $this->authorize('delete', $todo);
        $todo->delete();

        return redirect()->route('todos.index');
    }
}

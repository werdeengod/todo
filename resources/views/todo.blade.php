@extends('layouts.app')

@section('title', 'Todo')

@section('content')
    <form action="{{route('logout')}}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">Выйти из аккаунта</button>
    </form>
    <h1>Добавить дело</h1>
    <form action="{{route('todos.store')}}" method="post">
        @csrf
        <div>
            <label for="title">Введите название дела</label>
            <input type="text" name="title" id="title">
            @error('title')
                {{ $message }}
            @enderror
        </div>
        <button type="submit">Добавить</button>
    </form>
    <h1>Список дел</h1>
    @if ($todos->count() > 0)
        @foreach ($todos as $todo)
            <div>Название дела: {{$todo->title}}</div>
            <div>
                <form action="{{route('todos.destroy', $todo->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            onclick="return confirm('Удалить?')">
                        Удалить
                    </button>
                </form>
            </div>
        @endforeach
    @else
        <div>
            Список дел пуст. Добавьте первое дело!
        </div>
    @endif
@endsection
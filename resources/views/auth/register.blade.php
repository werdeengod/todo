@extends('layouts.app')

@section('title', 'Регистрация')

@section('content')
<h1>Регистрация</h1>
<form method="POST" action="{{ route('register') }}">
    @csrf

    <div>
        <label for="login">Введите логин</label>
        <input type="text" name="login" id="login">
        @error('login')
            {{ $message }}
        @enderror
    </div>
    <div>
        <label for="password">Введите пароль</label>
        <input type="password" name="password" id="password">
        @error('password')
            {{ $message }}
        @enderror
    </div>
    <div>
        <label for="password_confirmation">Повторите пароль</label>
        <input type="password" name="password_confirmation" id="password_confirmation">
    </div>
    <button type="submit">Зарегистриваться</button>
</form>
<a href="{{route('login')}}">Войти</a>
@endsection
@extends('layouts.app')

@section('title', 'Авторизация')

@section('content')
<h1>Авторизация</h1>
<form method="POST" action="{{ route('login') }}">
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
    <button type="submit">Войти</button>
    @error('error')
        {{ $message }}
    @enderror
</form>
<a href="{{route('register')}}">Зарегистриваться</a>
@endsection
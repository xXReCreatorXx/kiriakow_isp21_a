@extends('layout.base')

@section('title', 'Авторизация')

@section('konten')

<form id="authorization" class="login-form authorization" action="{{ route('authorization') }}" method="POST">
@csrf
    <div class="login-form_header">
        <h2 class="login-form_title">Авторизация</h2>

        
    </div>

    <div class="login-form_input-container">
        <div class="login-form_input-block">
            <p class="login-form_input-title">Email</p>
            <input class="login-form_input {{ $errors->has('email') ? 'no_validate' : '' }}" type="email" name="email" value="{{ old('email') }}" />
            @error("email")
            <p class="text-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="login-form_input-block">
            <p class="login-form_input-title">Пароль</p>
            <input class="login-form_input {{ $errors->has('password') ? 'no_validate' : '' }}" type="password" name="password" />
            @error("password")
            <p class="text-error">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <button class="login-form_button auth-button" type="submit">Войти</button>

    <div class="login-form_relocate">
        <p class="login-form_p">Нет аккаунта?</p>

        <a class="login-form_link" href="/registration">Зарегистрироваться</a>
    </div>
</form>

@endsection
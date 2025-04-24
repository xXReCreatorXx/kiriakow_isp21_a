@extends('layout.base')

@section('title', 'Регистрация')

@section('konten')

<form id="registration" class="login-form registration" action="{{ route('registration') }}" method="POST">
@csrf
    <div class="login-form_header">
        <h2 class="login-form_title">Регистрация</h2>

        
    </div>

    <div class="login-form_input-container">
        <div class="login-form_block-two">
            <div class="login-form_input-block">
                <p class="login-form_input-title">Имя</p>
                <input class="login-form_input {{ $errors->has('first_name') ? 'no_validate' : '' }}" type="text" name="first_name" value="{{ old('first_name') }}" />
                @error("first_name")
                <p class="text-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="login-form_input-block">
                <p class="login-form_input-title">Фамилия</p>
                <input class="login-form_input {{ $errors->has('last_name') ? 'no_validate' : '' }}" type="text" name="last_name" value="{{ old('last_name') }}" />
                @error("last_name")
                <p class="text-error">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="login-form_input-block">
            <p class="login-form_input-title">Email</p>
            <input class="login-form_input {{ $errors->has('email') ? 'no_validate' : '' }}" type="email" name="email" value="{{ old('email') }}" />
            @error("email")
            <p class="text-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="login-form_input-block">
            <p class="login-form_input-title">Номер телефона</p>
            <input id="phone" class="login-form_input {{ $errors->has('phone') ? 'no_validate' : '' }}" type="text" name="phone" value="{{ old('phone') }}" />
            @error("phone")
            <p class="text-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="login-form_block-two">
            <div class="login-form_input-block">
                <p class="login-form_input-title">Пароль</p>
                <input class="login-form_input {{ $errors->has('password') ? 'no_validate' : '' }}" type="password" name="password" />
                @error("password")
                <p class="text-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="login-form_input-block">
                <p class="login-form_input-title">Подтвердите пароль</p>
                <input class="login-form_input" type="password" name="password_confirmation" />
            </div>
        </div>
    </div>

    <button class="login-form_button reg-button" type="submit">Зарегистрироваться</button>

    <div class="login-form_relocate">
        <p class="login-form_p">Уже есть аккаунт?</p>

        <a class="login-form_link" href="/authorization" >Войти</a>
    </div>
</form>


<script src="https://unpkg.com/imask"></script>
<script src="js/phoneMask.js"></script>

@endsection
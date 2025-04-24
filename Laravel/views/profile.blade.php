@foreach($user as $value)

@extends('layout.base')

@section("title", "Профиль")

@section('konten')

<div class="container-profile">
    <h2 class="container-profile_title-h2">Профиль</h2>

    <x-profile-menu />

    <div class="container-profile_title-block">
        <h3 class="container-profile_title-h3">Об аккаунте</h3>

        <form action="{{ route('logout') }}">
            <button class="container-profile_logout">Выйти из аккаунта</button>
        </form>
    </div>

    <div class="container-announ_header-right_user-inf">
        <img class="container-announ_header-right_user-img img-profile" src="{{ $value->image }}" alt="user avatar">

        <div class="container_flex_column">
            <p class="p_user-name">{{ $value->first_name . " " . $value->last_name }}</p>

            <div class="container-flex">
                <p class="p_user-date_title p-profile">Дата регистрации:</p>

                <p class="p_user-date p-profile">{{ $date }}</p>
            </div>
        </div>
    </div>

    <div class="container-flex">
        <div class="container_flex-column mmr130">
            <h3 class="container-profile_title-h3 mrb25">Изменение пароля</h3>

            <form action="{{ route('reset.password') }}" method="POST">
            @csrf
                <div class="container-profile_input-block">
                    <div class="login-form_input-block">
                        <p class="login-form_input-title">Текущий пароль</p>
                        <input class="login-form_input input-profile {{ $errors->has('old_password') ? 'no_validate' : '' }}" type="password" name="old_password" />
                        @error("old_password")
                        <p class="text-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="login-form_input-block">
                        <p class="login-form_input-title">Новый пароль</p>
                        <input class="login-form_input input-profile {{ $errors->has('password') ? 'no_validate' : '' }}" type="password" name="password" />
                        @error("password")
                        <p class="text-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="login-form_input-block">
                        <p class="login-form_input-title">Подтвердите пароль</p>
                        <input class="login-form_input input-profile" type="password" name="password_confirmation" />
                    </div>
                </div>

                <button class="login-form_button button-profile" type="submit">Сохранить</button>
            </form>
        </div>

        <div class="container_flex-column">
            <h3 class="container-profile_title-h3 mrb25">Дополнительная информация</h3>

            <div class="container-profile_input-block">
                <div class="login-form_input-block">
                    <p class="login-form_input-title">Email</p>
                    <div class="login-form_input input-profile input-profile_email">
                        <p>{{ $value->email }}</p>
                    </div>
                </div>

                <div class="login-form_input-block">
                    <p class="login-form_input-title">Номер телефона</p>
                    <div class="login-form_input input-profile">
                        <p>{{ $value->phone }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@endforeach
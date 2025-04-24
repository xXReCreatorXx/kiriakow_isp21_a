@foreach($announ as $value)

@extends('layout.base')

@section("title", "$value->title")

@section('konten')

<div class="container-announ">
    <div class="container-announ_header">
        <div class="container-announ_header-left">
            <h2 class="container-announ_header-title">{{ $value->title }}</h2>

            <div class="container-announ_header-left_img-block">
                <div class="container-announ_header-left_img-block-main">
                    <img class="container-announ_header-left_img-main" src="{{ $value->image_src }}" alt="{{ $value->image_alt }}">
                </div>

                <div class="container-announ_header-left_img-block-other">

                </div>
            </div>
        </div>

        <div class="container-announ_header-right">
            <div class="container_flex-between">
                <h2 class="container-announ_header-price">@if($value->price == 0) Бесплатно @else {{ $value->price }}&#8381; @endif</h2>

                <img class="container-announ_header-menu" src="svg/menu.svg" alt="menu" />
            </div>

            <div class="container-announ_header-right_user-inf">
                <img class="container-announ_header-right_user-img" src="{{ $value->user_image }}" alt="user avatar">

                <div class="container_flex_column">
                    <p class="p_user-name">{{ $value->user_first_name . " " . $value->user_last_name }}</p>

                    <div class="container-flex">
                        <p class="p_user-date_title">Дата публикации:</p>

                        <p class="p_user-date">{{ $user_date }}</p>
                    </div>
                </div>
            </div>

            <div class="container-announ_header-right_tag">
                <p class="container-announ_header-right_tag-title">Категория:</p>
                <form action="category" method="GET">
                    <button class="container-announ_header-right_tag-name" style='color: {{ $value->tag_color }}' name="tag" value='{{ $value->tag_id }}'>{{ $value->tag_name }}</button>
                </form>
            </div>

            <div class="container-announ_header-right_button-block">
                @if(Auth::check())
                <div class="container-announ_header-right_button button-phone" id="button_phone" onclick='announPhone("{{ $value->user_phone }}")'>Показать номер</div>
                @else
                <form action="authorization">
                    <button class="container-announ_header-right_button button-phone">Показать номер</button>
                </form>
                @endif

                @if(empty($favorite))
                <form action="{{ route('announ') }}" method="POST">
                @csrf
                    <button class="container-announ_header-right_button button-favorit" name="favorite" value='{{ $value->id }}'>Избранное</button>
                </form>
                @else
                <form action="{{ route('favorite') }}">
                    <button class="container-announ_header-right_button button-favorit button-favorit_active">Избранное</button>
                </form>
                @endif
            </div>
        </div>
    </div>

    <div class="container-announ_middle">
        <h2 class="container-announ_middle-title">Описание</h2>

        <p class="container-announ_middle-description">{{ $value->description }}</p>
    </div>

    <div class="fother">

    </div>
</div>

<script src="js/announPhone.js"></script>

@endsection

@endforeach
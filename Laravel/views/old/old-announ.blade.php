@foreach($announ as $value)

@extends('layout.base')

@section("title", "$value->title")

@section('konten')

<div class="main_header">
    <h1 class="main_header_title">{{ $value->title }}</h1>
</div>

<div class="main_item_container">
    <div class="main_item_container_prev">
        <div class="main_item_container_block_img">
            <img class="main_item_container_img" src='{{ $value->image_src }}' alt='{{ $value->image_alt }}'>
        </div>

        <div class="main_item_container_block_inf">
            <h2 class="main_item_container_block_inf_price">@if($value->price == 0) Бесплатно @else {{ $value->price }}&#8381; @endif</h2>

            @if(Auth::check())
            <div class="main_item_container_block_inf_form">
                <button class="main_item_container_block_inf_button button_contact" id="button_phone" onclick='announPhone("{{ $value->user_phone }}")'>Показать контакты</button>
            </div>
            @else
            <form class="main_item_container_block_inf_form" action="authorization">
                <button class="main_item_container_block_inf_button button_contact">Показать контакты</button>
            </form>
            @endif

            @if(empty($favorite))
            <form class="main_item_container_block_inf_form" action="{{ route('announ') }}" method="POST">
            @csrf
                <input type="hidden" name="item_title_url" value="{{ $value->title_url }}">
                <button class="main_item_container_block_inf_button button_favorite" name="favorite" value='{{ $value->id }}'>Добавить в избранное</button>
            </form>
            @else 
            <form class="main_item_container_block_inf_form" action="{{ route('favorite') }}">
                <button class="main_item_container_block_inf_button button_favorite_link">Перейти в Избранное</button>
            </form>
            @endif

            <div class="main_item_container_block_inf_user">
                <form class="main_item_container_block_inf_user_form" action="">
                    <img class="main_item_container_block_inf_user_img" src="{{ $value->user_image }}" alt="user image">
                </form>

                <div class="">
                    <form action="">
                        <p class="">{{ $value->user_first_name . " " . $value->user_last_name }}</p>
                    </form>

                    <p class="">На площадке с {{ $user_date }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="main_item_container_description">
        <div class="main_item_container_title">
            <h3 class="">Описание</h3>
        </div>

        <div class="main_item_container_contant">
            <h3 class="">{{ $value->description }}</h3>
        </div>
    </div>

    <div class="main_item_container_description">
        <div class="main_item_container_title">
            <h3 class="">Категория</h3>
        </div>

        <div class="main_item_container_contant">
            <form class="main_content_tag announ_button" action="category" method="GET">
                <button class="main_content_tag_button" style='background-color: {{ $value->tag_color }}' name="tag" value='{{ $value->tag_id }}'>
                    <p class="main_content_tag_button_text">{{ $value->tag_name }}</p>
                </button>
            </form>
        </div>
    </div>

    <div class="main_item_container_description_end">
        <div class="main_item_container_title">
            <h3 class="">Размещено</h3>
        </div>

        <div class="main_item_container_contant">
            <h3 class="">{{ $announ_date . " в " . $announ_time }}</h3>
        </div>
    </div>
    
</div>

<script src="js/announPhone.js"></script>

@endsection

@endforeach
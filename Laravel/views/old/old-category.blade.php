@extends('layout.base')

@section('title', 'Каталог')

@section('konten')

<div class="main_header">
    <h1 class="main_header_title">Каталог</h1>
</div>

<div class="main_container">
    <h2 class="main_container_title">Выберите категорию</h2>

    <div class="main_content tags">

        @foreach($all_tags as $tag)
            <form class="main_content_tag" action="category" method="GET">
                <button class="main_content_tag_button" style="background-color: {{ $tag->color }}" name="tag" value="{{ $tag->id }}'">
                    <p class="main_content_tag_button_text">{{ $tag->name }}</p>
                </button>
            </form>
        @endforeach

    </div>

    @if(isset($_GET["tag"]))
            <h2 class="main_container_title">Поиск по категории: {{ $tag_name }}</h2>

            <div class="main_content">
                @foreach($target_item as $announ)
                    <form class="main_content_block" action="announ" method="GET">
                        <button class="main_content_block_button" name="item" value="{{ $announ->title_url }}">
                            <div class="main_content_block_img">
                                <img class="img" src="{{ $announ->image_src }}" alt="{{ $announ->image_alt }}" />
                            </div>

                            <div class="main_content_block_inf">
                                @if($announ->price == 0)
                                    <h3 class="main_content_block_inf_price">Бесплатно</h2>
                                @else
                                    <h3 class="main_content_block_inf_price">{{ $announ->price }}&#8381;</h2>
                                @endif
                                <p class="main_content_block_inf_title">{{ $announ->title }}</p>
                            </div>
                        </button>
                    </form>
                @endforeach
            </div>
    @endif
</div>

@endsection
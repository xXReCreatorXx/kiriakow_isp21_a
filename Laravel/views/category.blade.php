@extends('layout.base')

@section('title', 'Каталог')

@section('konten')

<x-category :tags="$all_tags"/>

@if ($tag_name == NULL)

<div class="contant">
    <div class="contant_header">
        <h2 class="contant_header-title">Все объявления</h2>

        
    </div>

    <div class="conteiner-grid">
        @foreach($target_item as $announ)
        <x-announ :announ="$announ"/>
        @endforeach
    </div>
</div>

@else

<div class="contant">
    <div class="contant_header">
        <h2 class="contant_header-title">{{ $tag_name }}</h2>

        <a class="contant_header-link" href="/category">Все объявления</a>
    </div>

    <div class="conteiner-grid">
        @foreach($target_item as $announ)
        <x-announ :announ="$announ"/>
        @endforeach
    </div>
</div>

@endif

<script src="js/changeText.js"></script>
<script>
    changeText("contant_announ-inf_description", 105);
    changeText("contant_announ-inf_title", 18);
</script>

@endsection
@extends('layout.base')

@section('title', 'TableNote')

@section('konten')

<x-category :tags="$all_tags"/>

<div class="contant">
    <div class="contant_header">
        <h2 class="contant_header-title">Бесплатные предложения</h2>

        <a class="contant_header-link" href="/free">Больше объявлений</a>
    </div>

    <div class="conteiner-grid">
        @foreach($free_announs as $announ)
        <x-announ :announ="$announ"/>
        @endforeach
    </div>
</div>

<div class="contant">
    <div class="contant_header">
        <h2 class="contant_header-title">Все объявления</h2>

        <a class="contant_header-link" href="/category">Больше объявлений</a>
    </div>

    <div class="conteiner-grid">
        @foreach($all_announs as $announ)
        <x-announ :announ="$announ"/>
        @endforeach
    </div>
</div>

<script src="js/changeText.js"></script>
<script>
    changeText("contant_announ-inf_description", 105);
    changeText("contant_announ-inf_title", 18);
</script>

@endsection
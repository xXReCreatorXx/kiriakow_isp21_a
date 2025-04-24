@extends('layout.base')

@section("title", "Админ-панель")

@section('konten')

<div class="container-profile">
    <h2 class="container-profile_title-h2">Профиль</h2>

    <x-profile-menu />

    <div class="container-profile_title-block">
        <h3 class="container-profile_title-h3">Админ-панель</h3>

        
    </div>

    <x-admin-menu />

    @if(!empty($approv_announ))
    <div class="conteiner-grid favorit-gap">
        @foreach($approv_announ as $announ)
        <x-announ-card-admin :announ="$announ" />
        @endforeach
    </div>
    @else
    <div class="container_announ-empty">
        <h2 class="announ-empty_title">¯\_(ツ)_/¯<BR>Одобренных Объявлений нет</h2>
    </div>
    @endif
</div>

<script src="js/changeText.js"></script>
<script>
    changeText("contant_announ-inf_description", 105);
    changeText("contant_announ-inf_title", 18);
</script>

@endsection
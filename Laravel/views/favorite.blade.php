@extends('layout.base')

@section('title', 'Избранное')

@section('konten')

<div class="container-profile">
    <h2 class="container-profile_title-h2">Профиль</h2>

    <x-profile-menu />

    <div class="container-profile_title-block">
        <h3 class="container-profile_title-h3">Избранное</h3>
    </div>

    @php $flag = NULL; @endphp
    @if(!empty($favorite_announ))
    <div class="conteiner-grid favorit-gap">
        @foreach($favorite_announ as $announ)
            @if($announ->announ_status == 1)
            @php $flag = 1; @endphp
            <x-announ-card-favorite :announ="$announ"/>
            @endif
        @endforeach
    </div>
    @endif
    
    @if(!isset($flag))
    <div class="container_announ-empty">
        <h2 class="announ-empty_title">¯\_(ツ)_/¯<BR>У вас нет избранных объявлений</h2>
    </div>
    @endif
</div>

<script src="js/changeText.js"></script>
<script>
    changeText("contant_announ-inf_description", 105);
    changeText("contant_announ-inf_title", 18);
</script>

@endsection
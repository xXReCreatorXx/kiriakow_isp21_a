<div class="contant_announ">
    <form action="{{ route('announ') }}" method="GET">
        <button class="contant_announ-button" name="item" value="{{ $announ->title_url }}">
            <img class="contant_announ-image" src="{{ $announ->image_src }}" alt="{{ $announ->image_alt }}">
        </button>
    </form>

    <div class="contant_announ-inf">
        <div class="contant_announ-inf_header">
            <a class="contant_announ-inf_title" href="/announ?item={{ $announ->title_url }}">{{ $announ->title }}</a>

            <form action="category" method="GET">
                <button class="contant_announ-inf_tag" style="color: {{ $announ->tag_color }}" name="tag" value='{{ $announ->tag_id }}'>{{ $announ->tag_name }}</button>
            </form>
        </div>

        <div class="container_admin-menu">
        @if($announ->status == 2)
            <div class="container_admin-menu_status">
                <p class="admin-menu_status-title">Статус:</p>

                <p class="admin-menu_status status-consid">На рассмотрении</p>
            </div>
        @elseif($announ->status == 1)
            <div class="container_admin-menu_status">
                <p class="admin-menu_status-title">Статус:</p>

                <p class="admin-menu_status status-approv">Одобрено</p>
            </div>
        @else
            <div class="container_admin-menu_status">
                <p class="admin-menu_status-title">Статус:</p>

                <p class="admin-menu_status status-reject">Отклонено</p>
            </div>
        @endif
        </div>

        <p class="contant_announ-inf_description">{{ $announ->description }}</p>

        <div class="contant_announ-inf_foter">
            @if ($announ->price == 0)
                <p class="contant_announ-inf_price">Бесплатно</p>
            @else
                <p class="contant_announ-inf_price">{{ $announ->price }}&#8381;</p>
            @endif

            <button onclick="announMenu({{ $announ->id }})">
                <img class="contant_announ-inf_menu" src="svg/menu.svg"></img>
            </button>
        </div>
    </div>

    <div id="{{ $announ->id }}" class="contant-announ_menu my-announ_menu-container">
        <form action="{{ route('editannoun') }}" method="GET">
            @csrf
            <button class="contant-announ_menu-button first-button" name="item" value="{{ $announ->title_url }}">
                <img class="contant-announ_menu-button_img" src="svg/edit.svg" alt="edit my announ">

                <p class="contant-announ_menu-button_p">Редактировать</p>
            </button>
        </form>

        <form action="{{ route('myannoun') }}" method="POST">
        @csrf
            <button class="contant-announ_menu-button" name="delete" value="{{ $announ->id }}">
                <img class="contant-announ_menu-button_img" src="svg/myAnnounDelete.svg" alt="delete my announ">

                <p class="contant-announ_menu-button_p">Удалить</p>
            </button>
        </form>
    </div>
</div>

<script src="js/announCardMenu.js"></script>
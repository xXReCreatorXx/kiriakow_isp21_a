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

    <div id="{{ $announ->id }}" class="contant-announ_menu">
        @if(Auth::check())
            @foreach($favorite as $f_item)
                @if($f_item->announ_id == $announ->id)
                @php $favorite_id = $f_item->id @endphp
                <form action="{{ route('favorite') }}" method="POST">
                @csrf
                    <button class="contant-announ_menu-button" name="delete" value="{{ $favorite_id }}">
                        <img class="contant-announ_menu-button_img" src="svg/favoriteDelete.svg" alt="delete favorite">

                        <p class="contant-announ_menu-button_p">Удалить из избранное</p>
                    </button>
                </form>
                @break
                @endif
            @endforeach

            @if(!isset($favorite_id))
            <form action="{{ route('announ') }}" method="POST">
            @csrf
                <button class="contant-announ_menu-button" name="favorite" value='{{ $announ->id }}'>
                    <img class="contant-announ_menu-button_img" src="svg/favoriteAdd.svg" alt="add favorite">

                    <p class="contant-announ_menu-button_p">Добавить в избранное</p>
                </button>
            </form>
            @endif
        @else
        <form action="{{ route('announ') }}" method="POST">
        @csrf
            <button class="contant-announ_menu-button" name="favorite" value='{{ $announ->id }}'>
                <img class="contant-announ_menu-button_img" src="svg/favoriteAdd.svg" alt="add favorite">

                <p class="contant-announ_menu-button_p">Добавить в избранное</p>
            </button>
        </form>
        @endif
    </div>
</div>

<script src="js/announCardMenu.js"></script>
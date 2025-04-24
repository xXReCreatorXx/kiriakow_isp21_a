<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Kiriakow Alekcander">
        <meta name="description" content="TableNote">
        <meta name="keywords" content="TableNote">
        <link rel="stylesheet" href="css/style.css">
        <title>@yield('title')</title>
    </head>
    
    <body>
        
        <header>
            <div class="header_profile">
                @auth
                    <form class="header_profile_user" action="{{ route('logout') }}">
                        <img class="header_profile_user_img" src="{{ Auth::user()->image }}" alt="user_img" />

                        <button class="header_profile_user_name">{{ Auth::user()->last_name . " " . Auth::user()->first_name }}</button>
                    </form>

                    <div class="header_profile_menu">
                        <form class="header_button">
                            <img class="header_profile_menu_svg" src="svg/person.svg" alt="person_svg" />

                            <button class="header_profile_menu_title">Мои объявления</button>
                        </form>
                    </div>

                    <div class="header_profile_menu">
                        <form class="header_button">
                            <img class="header_profile_menu_svg" src="svg/add.svg" alt="person_svg" />

                            <button class="header_profile_menu_title">Добавить объявление</button>
                        </form>
                    </div>

                    <div class="header_profile_menu">
                        <form class="header_button" action="{{ route('favorite') }}">
                            <img class="header_profile_menu_svg" src="svg/favorite.svg" alt="person_svg" />

                            <button class="header_profile_menu_title">Избранное</button>
                        </form>
                    </div>
                @endauth

                @guest
                    <div class="header_profile_block">
                        <form class="header_profile_form" action="authorization" method="">
                            <button class="header_profile_form_button">Войти</button>
                        </form>

                        <form class="header_profile_form" action="registration" method="">
                            <button class="header_profile_form_button">Зарегистрироваться</button>
                        </form>
                    </div>
                @endguest
            </div>

            <div class="header_menu">
                <form class="header_button" action="/">
                    <img class="header_profile_menu_svg" src="svg/home.svg" alt="home_svg" />

                    <button class="header_profile_menu_title">Главная</button>
                </form>

                <form class="header_button" action="category">
                    <img class="header_profile_menu_svg" src="svg/category.svg" alt="category_svg" />

                    <button class="header_profile_menu_title">Категории</button>
                </form>

                <form class="header_button" action="free">
                    <img class="header_profile_menu_svg" src="svg/free.svg" alt="free_svg" />

                    <button class="header_profile_menu_title">Даром</button>
                </form>
            </div>
        </header>

        <main>
            
            @yield('konten')

        </main>

    </body>
</html>
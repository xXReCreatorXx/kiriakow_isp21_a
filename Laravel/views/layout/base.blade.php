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
        <div class="wrapper">
            <header>
                <div class="header-logo">
                    <h1><a href="/">LOGO</a></h1>
                </div>

                <div class="header-navigation">
                    <div class="header-navigation_guest">
                        <div class="header-navigation_button">
                            <img src="svg/home.svg" alt="home svg">

                            <a class="header-navigation_link" href="/">Главная</a>
                        </div>

                        <div class="header-navigation_button">
                            <img src="svg/category.svg" alt="home svg">

                            <a class="header-navigation_link" href="/category">Каталог</a>
                        </div>

                        <div class="header-navigation_button">
                            <img src="svg/free.svg" alt="home svg">

                            <a class="header-navigation_link" href="/free">Даром</a>
                        </div>
                    </div>

                    @guest
                    <div class="header-navigation_auth">
                        <div class="header-navigation_button authorization-button">
                            <img src="svg/authorization.svg" alt="home svg">

                            <a class="header-navigation_link" href="/authorization" >Войти</a>
                        </div>
                    </div>
                    @endguest

                    @auth
                    <div class="header-navigation_auth">
                        <div class="header-navigation_button">
                            <img src="svg/favorite.svg" alt="home svg">

                            <a class="header-navigation_link" href="/favorite">Избранное</a>
                        </div>

                        <div class="header-navigation_button">
                            <img src="svg/person.svg" alt="home svg">

                            <a class="header-navigation_link" href="/myannoun">Мои объявления</a>
                        </div>

                        <div class="header-navigation_button authorization-button">
                            <img class="user-image" src="{{ Auth::user()->image }}" alt="home svg">

                            <a class="header-navigation_link" href="/profile">{{ Auth::user()->last_name . " " . Auth::user()->first_name }}</a>
                        </div>
                    </div>
                    @endauth
                </div>
            </header>

            <main>
                
                @yield('konten')

            </main>
        </div>
    </body>
</html>
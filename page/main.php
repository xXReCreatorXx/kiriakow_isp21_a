<!DOCTYPE html>
<html lang='ru'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <meta name='author' content='Kiriakow Alekcander'>
        <meta name='description' content='Optinization'>
        <meta name='keywords' content='PHP'>
        <link rel='stylesheet' href='style.css'>
        <title>Мой Не Сам</title>
    </head>
    
    <body>
        <header>
        <?php
        if (isset($_SESSION["id"])) {
            echo "
            <div class='header'>
                <form action='home' method=''>
                    <button class='header_title_button' type='submit'><h1 class='header_title'>Мой Не Сам</h1></button>
                </form>

                <div class='menu'>
                    <img class='menu_svg' src='../svg/menu.svg' />
                </div>
            </div>
            ";
        }
        ?>
        </header>

        <main>
            <?php require "api/api.php"; ?>
        </main>

    </body>
</html>
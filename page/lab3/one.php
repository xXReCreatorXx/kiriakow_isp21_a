<HTML>
    <HEAD>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Kiriakow Alekcander">
        <meta name="discription" content="Just PHP and HTML">
        <meta name="keywords" content="PHPinfo">
        <link rel="stylesheet" href="one.css">
        <TITLE>PHPInfo</TITLE>
    </HEAD>
    
    <BODY>
        <div class="header">
            <div class="header_menu">
                <button class="header_menu_button button_activ">Лабораторная работа №3</button>
                <button class="header_menu_button">Лабораторная работа №4</button>
            </div>
        </div>

        <div class="content">

            <div class="content_block">
                <H2 class="title">Задание №1</H2>
                    
                <?php
                $L = 2 * 3.14 * $_POST["range"];
                $S = 3.14 * pow($_POST["range"], 2);
                echo "Длинна окружности =  $L <BR>";
                echo "Площадь круга =  $S <BR>";
                ?>

                <div class="row"></div>
            </div>
        </div>
    </BODY>
</HTML>
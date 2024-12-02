<HTML>
    <HEAD>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Kiriakow Alekcander">
        <meta name="discription" content="Just PHP and HTML">
        <meta name="keywords" content="PHPinfo">
        <link rel="stylesheet" href="../lab3/one.css">
        <TITLE>Задание №3</TITLE>
    </HEAD>
    
    <BODY>
        <div class="header">
            <div class="header_menu">
                <div class="header_menu_button"><a class="link" href="../../index.php">Лабораторная работа №3</a></div>

                <div class="header_menu_button button_activ"><a class="link link_activ" href="index.php">Лабораторная работа №4</a></div>

                <div class="header_menu_button"><a class="link" href="../lab5/index.php">Лабораторная работа №5</a></div>

                <div class="header_menu_button"><a class="link" href="../lab6/index.php">Лабораторная работа №6</a></div>

                <div class="header_menu_button"><a class="link" href="../lab7/index.php">Лабораторная работа №7</a></div>
            </div>
        </div>

        <div class="content">

            <div class="content_block">
                <H2 class="title">Задание №3</H2>
                    
                <?php
                $x = $_POST["X"];
                $a = 2.6;
                $b = 5.1;
                if ($x <= 1) {
                    $y = $a * pow(cos($x), 2) - $b * sin(pow($x, 2));
                } elseif ((1 < $x) && ($x <= 4)) {
                    $y = $b * log($x) + pow($x, 3);
                } else {
                    $y = sqrt(pow($x, 2) + $a * $b);
                }
                echo "y = f(x): $y";
                ?>

                <div class="row"></div>
            </div>
        </div>
    </BODY>
</HTML>
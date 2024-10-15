<HTML>
    <HEAD>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Kiriakow Alekcander">
        <meta name="discription" content="Just PHP and HTML">
        <meta name="keywords" content="PHPinfo">
        <link rel="stylesheet" href="../lab3/one.css">
        <TITLE>PHPInfo</TITLE>
    </HEAD>
    
    <BODY>
        <div class="header">
            <div class="header_menu">
                <div class="header_menu_button"><a class="link" href="../../index.php">Лабораторная работа №3</a></div>
                <div class="header_menu_button button_activ"><a class="link link_activ" href="index.php">Лабораторная работа №4</a></div>
            </div>
        </div>

        <div class="content">

            <div class="content_block">
                <H2 class="title">Задание №1</H2>
                    
                <?php
                $A = $_POST["A"];
                $B = $_POST["B"];
                $C = $_POST["C"];
                if (($B > $A) && ($B < $C)) {
                    echo "Выражение истинно";
                } else {
                    echo "Выражение ложно";
                }
                ?>

                <div class="row"></div>
            </div>
        </div>
    </BODY>
</HTML>
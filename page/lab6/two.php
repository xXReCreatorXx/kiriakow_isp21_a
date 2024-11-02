<HTML>
    <HEAD>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Kiriakow Alekcander">
        <meta name="discription" content="Just PHP and HTML">
        <meta name="keywords" content="PHPinfo">
        <link rel="stylesheet" href="../lab3/one.css">
        <TITLE>Задание №2</TITLE>
    </HEAD>
    
    <BODY>
        <div class="header">
            <div class="header_menu">
                <div class="header_menu_button"><a class="link" href="../../index.php">Лабораторная работа №3</a></div>
                
                <div class="header_menu_button"><a class="link" href="../lab4/index.php">Лабораторная работа №4</a></div>

                <div class="header_menu_button"><a class="link" href="../lab5/index.php">Лабораторная работа №5</a></div>

                <div class="header_menu_button button_activ"><a class="link link_activ" href="index.php">Лабораторная работа №6</a></div>
            </div>
        </div>

        <div class="content">

            <div class="content_block">
                <H2 class="title">Задание №2</H2>
                
                <div class="center">
                    <?php
                    $N = $_POST["N"];
                    $A = [];
                    $B = [];

                    for ($i = 1; $i <= $N; $i++) {
                        $random = rand(1, 99);
                        array_push($A, $random);
                    }
                    echo "| ";
                    foreach ($A as $value) {
                        echo " $value |";
                    }

                    echo "<BR>";

                    for ($j = 1; $j <= $N; $j++) {
                        $sum = 0;
                        for ($i = 0; $i < $j; $i++) {
                            $sum += $A[$i];
                        }
                        $ras = $sum / $j;
                        array_push($B, $ras);
                    }
                    echo "| ";
                    foreach ($B as $value) {
                        echo " $value |";
                    }
                    ?>
                </div>

                <div class="row"></div>
            </div>
        </div>
    </BODY>
</HTML>
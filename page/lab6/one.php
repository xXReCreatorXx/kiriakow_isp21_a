<HTML>
    <HEAD>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Kiriakow Alekcander">
        <meta name="discription" content="Just PHP and HTML">
        <meta name="keywords" content="PHPinfo">
        <link rel="stylesheet" href="../lab3/one.css">
        <TITLE>Задание №1</TITLE>
    </HEAD>
    
    <BODY>
        <div class="header">
            <div class="header_menu">
                <div class="header_menu_button"><a class="link" href="../../index.php">Лабораторная работа №3</a></div>
                
                <div class="header_menu_button"><a class="link" href="../lab4/index.php">Лабораторная работа №4</a></div>

                <div class="header_menu_button"><a class="link" href="../lab5/index.php">Лабораторная работа №5</a></div>

                <div class="header_menu_button button_activ"><a class="link link_activ" href="index.php">Лабораторная работа №6</a></div>

                <div class="header_menu_button"><a class="link" href="../lab7/index.php">Лабораторная работа №7</a></div>
            </div>
        </div>

        <div class="content">

            <div class="content_block">
                <H2 class="title">Задание №1</H2>
                
                <div class="center">
                    <?php
                    $N = $_POST["N"];
                    $array = [];
                    $new_array = [];
                    $ch = 0;

                    for ($i = 1; $i <= $N; $i++) {
                        $random = rand(1, 99);
                        array_push($array, $random);
                    }
                    echo "| ";
                    foreach ($array as $value) {
                        echo " $value |";
                    }

                    echo "<BR>";

                    foreach ($array as $value) {
                        if ($value % 2 == 0) {
                            array_push($new_array, $value);
                        }
                    }
                    $array_rev = array_reverse($new_array);
                    echo "| ";
                    foreach ($array_rev as $value) {
                        echo " $value |";
                        $ch++;
                    }

                    echo "<BR>";

                    echo "Количество чётных чисел в массиве: $ch";
                    ?>
                </div>

                <div class="row"></div>
            </div>
        </div>
    </BODY>
</HTML>
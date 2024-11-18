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

                <div class="header_menu_button"><a class="link" href="../lab6/index.php">Лабораторная работа №6</a></div>

                <div class="header_menu_button button_activ"><a class="link link_activ" href="index.php">Лабораторная работа №7</a></div>
            </div>
        </div>

        <div class="content">

            <div class="content_block">
                <H2 class="title">Задание №2</H2>
                
                <div class="center">
                    <?php
                    $M = $_POST["M"];
                    $N = $_POST["N"];
                    $array_M = [];
                    $pol_M = $M / 2;
                    $pol_N = $N / 2;

                    for ($i = 0; $i < $M; $i++) {
                        $array_N = [];
                        for ($j = 0; $j < $N; $j++) {
                            $random = rand(1, 99);
                            array_push($array_N, $random);
                        }
                        array_push($array_M, $array_N);
                    }

                    for ($i = 0; $i < count($array_M); $i++) {
                        echo "|";
                        for ($j = 0; $j < count($array_M[$i]); $j++) {
                            echo " " . $array_M[$i][$j] . " |";
                        }
                        echo "<BR>";
                    }

                    echo "<BR>";

                    for ($i = 0; $i < $pol_M; $i++) {
                        for ($j = 0; $j < $pol_N; $j++) {
                            $save = $array_M[$i][$j];
                            $array_M[$i][$j] = $array_M[$i + $pol_M][$j + $pol_N];
                            $array_M[$i + $pol_M][$j + $pol_N] = $save;
                        }
                    }

                    for ($i = 0; $i < count($array_M); $i++) {
                        echo "|";
                        for ($j = 0; $j < count($array_M[$i]); $j++) {
                            echo " " . $array_M[$i][$j] . " |";
                        }
                        echo "<BR>";
                    }
                    ?>
                </div>

                <div class="row"></div>
            </div>
        </div>
    </BODY>
</HTML>
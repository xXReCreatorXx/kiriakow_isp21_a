<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Kiriakow Alekcander">
        <meta name="description" content="Just PHP and HTML">
        <meta name="keywords" content="PHP">
        <link rel="stylesheet" href="../../style.css">
        <title>Лабораторная работа №7</title>
    </head>

    <body>
        <div class="conteiner">
            <div class="header">
                <div class="header_menu">
                    <div class="header_menu_button"><a class="link" href="../../index.php">Лабораторная работа №3</a></div>

                    <div class="header_menu_button"><a class="link" href="../lab4/index.php">Лабораторная работа №4</a></div>

                    <div class="header_menu_button"><a class="link" href="../lab5/index.php">Лабораторная работа №5</a></div>

                    <div class="header_menu_button"><a class="link" href="../lab6/index.php">Лабораторная работа №6</a></div>

                    <div class="header_menu_button button_activ"><a class="link link_activ">Лабораторная работа №7</a></div>
                </div>
            </div>

            <div class="content">

                <div class="content_block">
                    <pre class="content_block_script overflow">
                        <code class="script">
$M = $_POST["M"];;
$N = $_POST["N"];;
$array_M = [];
$K = rand(1, $M);

echo "Номер выводимой строки: $K";

for ($i = 0; $i < $M; $i++) {
    $array_N = [];
    for ($j = 0; $j < $N; $j++) {
        $random = rand(1, 99);
        array_push($array_N, $random);
    }
    array_push($array_M, $array_N);
}

for ($i = 0; $i < count($array_M); $i++) {
    for ($j = 0; $j < count($array_M[$i]); $j++) {
        echo "| " . $array_M[$i][$j] . " ";
    }
}

for ($i = 0; $i < count($array_M); $i++) {
    if ($i + 1 == $K) {
        for ($j = 0; $j < count($array_M[$i]); $j++) {
            echo "| " . $array_M[$i][$j] . " ";
        }
    echo "|";
    }
}
                        </code>
                    </pre>

                    <div class="row"></div>

                    <div class="content_block_text">
                        <h2>Задание №1</h2>

                        <p>Дана матрица размера M × N и целое число K (1 ≤ K ≤ M ).<BR>Вывести элементы K -й строки данной матрицы.</p>

                        <form action="one.php" method="post">
                            <input class="script_input" type="number" name="M" placeholder="Введите значение M">

                            <input class="script_input" type="number" name="N" placeholder="Введите значение N">

                            <button class="script_button" type="submit">Выполнить</button>
                        </form>
                    </div>
                </div>



                <div class="content_block">
                    <pre class="content_block_script overflow">
                        <code class="script">
$M = $_POST["M"];;
$N = $_POST["N"];;
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
}

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
}
                        </code>
                    </pre>

                    <div class="row"></div>

                    <div class="content_block_text">
                        <h2>Задание №2</h2>

                        <p>Дана матрица размера  M × N (M и  N —  четные числа).<BR>Поменять местами левую верхнюю и правую нижнюю четверти матрицы.</p>

                        <form action="two.php" method="post">
                            <input class="script_input" type="number" name="M" placeholder="Введите значение M">

                            <input class="script_input" type="number" name="N" placeholder="Введите значение N">

                            <button class="script_button" type="submit">Выполнить</button>
                        </form>
                    </div>
                </div>

            </div>

            <div class="foter">
                <p>&copy; Copyright Киряков Александр</p>
            </div>
        </div>
    </body>
</html>
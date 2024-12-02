<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Kiriakow Alekcander">
        <meta name="description" content="Just PHP and HTML">
        <meta name="keywords" content="PHP">
        <link rel="stylesheet" href="../../style.css">
        <title>Лабораторная работа №4</title>
    </head>

    <body>
        <div class="conteiner">
            <div class="header">
                <div class="header_menu">
                    <div class="header_menu_button"><a class="link" href="../../index.php">Лабораторная работа №3</a></div>

                    <div class="header_menu_button button_activ"><a class="link link_activ">Лабораторная работа №4</a></div>

                    <div class="header_menu_button"><a class="link" href="../lab5/index.php">Лабораторная работа №5</a></div>

                    <div class="header_menu_button"><a class="link" href="../lab6/index.php">Лабораторная работа №6</a></div>

                    <div class="header_menu_button"><a class="link" href="../lab7/index.php">Лабораторная работа №7</a></div>

                    <div class="header_menu_button"><a class="link" href="../questions/questions.php">Ques</a></div>
                </div>
            </div>

            <div class="content">

                <div class="content_block">
                    <pre class="content_block_script">
                        <code class="script">
$A = $_POST["A"];
$B = $_POST["B"];
$C = $_POST["C"];
if (($B > $A) && ($B < $C)) {
    echo "Выражение истинно";
} else {
    echo "Выражение ложно";
}
                        </code>
                    </pre>

                    <div class="row"></div>

                    <div class="content_block_text">
                        <h2>Задание №1</h2>

                        <p>Даны три целых числа: A, B, C.<BR>Проверить истинность высказывания:<BR>«Число B находится между числами A и C»</p>

                        <form action="one.php" method="post">
                            <input class="script_input" type="number" name="A" placeholder="Введите значение A">

                            <input class="script_input" type="number" name="B" placeholder="Введите значение B">

                            <input class="script_input" type="number" name="C" placeholder="Введите значение C">

                            <button class="script_button" type="submit">Выполнить</button>
                        </form>
                    </div>
                </div>



                <div class="content_block">
                    <pre class="content_block_script">
                        <code class="script">
$one = $_POST["one"];
$two = $_POST["two"];
if ($one < $two) {
    echo "Меньшее значение под подномером 1";
} else {
    echo "Меньшее значение под подномером 2";
}
                        </code>
                    </pre>

                    <div class="row"></div>

                    <div class="content_block_text">
                        <h2>Задание №2</h2>

                         <p>Даны два числа.<BR>Вывести порядковый номер меньшего из них.</p>

                        <form action="two.php" method="post">
                            <input class="script_input" type="number" name="one" placeholder="Введите значение первой переменной">

                            <input class="script_input" type="number" name="two" placeholder="Введите значение второй переменной">

                            <button class="script_button" type="submit">Выполнить</button>
                        </form>
                    </div>
                </div>



                <div class="content_block">
                    <pre class="content_block_script">
                        <code class="script">
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
echo "y = f(x): $y"
                        </code>
                    </pre>

                    <div class="row"></div>

                    <div class="content_block_text">
                        <h2>Задание №3</h2>

                        <p>Вычислить значение функции y=f(x)<BR>при произвольных значениях X</p>

                        <form action="tree.php" method="post">
                            <input class="script_input" type="number" step="0.01" name="X" placeholder="Введите значение X">

                            <button class="script_button" type="submit">Выполнить</button>
                        </form>
                    </div>
                </div>



                <div class="content_block">
                    <pre class="content_block_script">
                        <code class="script">
$x = $_POST["X"];
$a = 2.6;
$b = 5.1;
switch($x){
    case 1:
        $y = $a * pow(cos($x), 2) - $b * sin(pow($x, 2));
        echo "y = f(x): $y";
        break;

    case 4:
        $y = $b * log($x) + pow($x, 3);
        echo "y = f(x): $y";
        break;

    case 5:
        $y = sqrt(pow($x, 2) + $a * $b);
        echo "y = f(x): $y";
        break;

    default:
        echo "X не удавлетворяет ни одному из условий";
        break;
}
                        </code>
                    </pre>

                    <div class="row"></div>

                    <div class="content_block_text">
                        <h2>Задание №4</h2>

                        <p>Вычислить значение функции y=f(x)<BR>при произвольных значениях X</p>

                        <form action="four.php" method="post">
                            <input class="script_input" type="number" name="X" placeholder="Введите значение X">

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
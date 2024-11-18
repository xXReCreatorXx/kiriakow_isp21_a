<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Kiriakow Alekcander">
        <meta name="description" content="Just PHP and HTML">
        <meta name="keywords" content="PHP">
        <link rel="stylesheet" href="../../style.css">
        <title>Лабораторная работа №5</title>
    </head>

    <body>
        <div class="conteiner">
            <div class="header">
                <div class="header_menu">
                    <div class="header_menu_button"><a class="link" href="../../index.php">Лабораторная работа №3</a></div>

                    <div class="header_menu_button"><a class="link" href="../lab4/index.php">Лабораторная работа №4</a></div>

                    <div class="header_menu_button button_activ"><a class="link link_activ">Лабораторная работа №5</a></div>

                    <div class="header_menu_button"><a class="link" href="../lab6/index.php">Лабораторная работа №6</a></div>

                    <div class="header_menu_button"><a class="link" href="../lab7/index.php">Лабораторная работа №7</a></div>
                </div>
            </div>

            <div class="content">

                <div class="content_block">
                    <pre class="content_block_script">
                        <code class="script">
$N = $_POST["N"];
$array_N = str_split($N);
$K = 0;
for ($i = 0; $i < count($array_N); $i++) {
    $a = $array_N[$i];
    if ($array_N[$i] % 2 == 0) {
        echo "$a";
        $K++;
    }
}
echo "Кол-во чётных чисел: $K";
                        </code>
                    </pre>

                    <div class="row"></div>

                    <div class="content_block_text">
                        <h2>Задание №1</h2>

                        <p>Дано  целое  число  N  и  набор  из  N целых  чисел.<BR>Вывести  в  том  же порядке все четные числа из данного набора<BR>и количество K таких чисел.</p>

                        <form action="one.php" method="post">
                            <input class="script_input" type="number" name="N" placeholder="Введите значение N">

                            <button class="script_button" type="submit">Выполнить</button>
                        </form>
                    </div>
                </div>



                <div class="content_block">
                    <pre class="content_block_script">
                        <code class="script">
$A = $_POST["A"];
$B = $_POST["B"];
$sum = 0;
if ($A < $B) {
    for ($i = $A; $i <= $B; $i++) {
        $sum += $i;
    }
    echo "Сумма всех целых чисел от A до B: $sum";
} else {
    echo "Ошибка! Значение A должна быть больше значения B";
}
                        </code>
                    </pre>

                    <div class="row"></div>

                    <div class="content_block_text">
                        <h2>Задание №2</h2>

                        <p>Даны два целых числа A и B (A < B).<BR>Найти сумму всех целых чисел от A до B включительно.</p>

                        <form action="two.php" method="post">
                            <input class="script_input" type="number" name="A" placeholder="Введите значение A">

                            <input class="script_input" type="number" name="B" placeholder="Введите значение B">

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
<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Kiriakow Alekcander">
        <meta name="description" content="Just PHP and HTML">
        <meta name="keywords" content="PHP">
        <link rel="stylesheet" href="../../style.css">
        <title>Лабораторная работа №6</title>
    </head>

    <body>
        <div class="conteiner">
            <div class="header">
                <div class="header_menu">
                    <div class="header_menu_button"><a class="link" href="../../index.php">Лабораторная работа №3</a></div>

                    <div class="header_menu_button"><a class="link" href="../lab4/index.php">Лабораторная работа №4</a></div>

                    <div class="header_menu_button"><a class="link" href="../lab5/index.php">Лабораторная работа №5</a></div>

                    <div class="header_menu_button button_activ"><a class="link link_activ">Лабораторная работа №6</a></div>

                    <div class="header_menu_button"><a class="link" href="../lab7/index.php">Лабораторная работа №7</a></div>

                    <div class="header_menu_button"><a class="link" href="../questions/questions.php">Ques</a></div>
                </div>
            </div>

            <div class="content">

                <div class="content_block">
                    <pre class="content_block_script overflow">
                        <code class="script">
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

echo "Количество чётных чисел в массиве: $ch";
                        </code>
                    </pre>

                    <div class="row"></div>

                    <div class="content_block_text">
                        <h2>Задание №1</h2>

                        <p>Дан целочисленный массив размера N.<BR>Вывести все содержащиеся в данном  массиве  четные  числа<BR>в  порядке  убывания  их  индексов,  а  также  их количество.</p>

                        <form action="one.php" method="post">
                            <input class="script_input" type="number" name="N" placeholder="Введите значение N">

                            <button class="script_button" type="submit">Выполнить</button>
                        </form>
                    </div>
                </div>



                <div class="content_block">
                    <pre class="content_block_script overflow">
                        <code class="script">
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
                        </code>
                    </pre>

                    <div class="row"></div>

                    <div class="content_block_text">
                        <h2>Задание №2</h2>

                        <p>Дан массив A размера N.<BR>Сформировать новый массив B того же размера по следующему правилу:<BR>Элемент Bk равен среднему арифметическому элементов массива A с номерами от 1 до k.</p>

                        <form action="two.php" method="post">
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
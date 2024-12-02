<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Kiriakow Alekcander">
        <meta name="description" content="Just PHP and HTML">
        <meta name="keywords" content="PHP">
        <link rel="stylesheet" href="style.css">
        <title>Лабораторная работа №3</title>
    </head>

    <body>
        <div class="conteiner">
            <div class="header">
                <div class="header_menu">
                    <div class="header_menu_button button_activ"><a class="link link_activ">Лабораторная работа №3</a></div>

                    <div class="header_menu_button"><a class="link" href="page/lab4/index.php">Лабораторная работа №4</a></div>

                    <div class="header_menu_button"><a class="link" href="page/lab5/index.php">Лабораторная работа №5</a></div>

                    <div class="header_menu_button"><a class="link" href="page/lab6/index.php">Лабораторная работа №6</a></div>

                    <div class="header_menu_button"><a class="link" href="page/lab7/index.php">Лабораторная работа №7</a></div>

                    <div class="header_menu_button"><a class="link" href="page/questions/questions.php">Ques</a></div>
                </div>
            </div>

            <div class="content">

                <div class="content_block">
                    <pre class="content_block_script">
                        <code class="script">
$L = 2 * 3.14 * $_POST["range"];
$S = 3.14 * pow($_POST["range"], 2);
echo "Длинна окружности =  $L";
echo "Площадь круга =  $S";
                        </code>
                    </pre>

                    <div class="row"></div>

                    <div class="content_block_text">
                        <h2>Задание №1</h2>

                        <p>Найти длину окружности L и площадь круга S заданного радиуса R:<BR>L = 2·π·R<BR>S = π·R2<BR>В качестве значения π использовать 3.14</p>

                        <form action="page/lab3/one.php" method="post">
                            <input class="script_input" type="number" name="range" placeholder="Введите значение радиуса">

                            <button class="script_button" type="submit">Выполнить</button>
                        </form>
                    </div>
                </div>

                <div class="content_block">
                    <pre class="content_block_script">
                        <code class="script">
$a = $_POST["array"];
$one = ($a/10)%10;
$two = $a % 10;
$sum = $one + $two;
$pro = $one * $two;
echo "Сумма цифр = $sum";
echo "Произведение цифр =  $pro";
                        </code>
                    </pre>

                    <div class="row"></div>

                    <div class="content_block_text">
                        <h2>Задание №2</h2>

                         <p>Дано двузначное число.<BR>Найти сумму и произведение его цифр.</p>

                        <form action="page/lab3/two.php" method="post">
                            <input class="script_input" type="number" name="array" placeholder="Введите значение переменной">

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


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
                ?>

                <div class="row"></div>
            </div>
        </div>
    </BODY>
</HTML>
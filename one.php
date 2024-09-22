<HTML>
    <HEAD>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Kiriakow Alekcander">
        <meta name="discription" content="Just PHP and HTML">
        <meta name="keywords" content="PHPinfo">
        <link rel="stylesheet" href="style.css">
        <TITLE>PHPInfo</TITLE>
    </HEAD>
    
    <BODY>
        <H2 class="title">Задание №1</H2>
            
        <?php
        if ($_POST["range"] != "") {
            $L = 2 * 3.14 * $_POST["range"];
            $S = 3.14 * pow($_POST["range"], 2);
            echo "Длинна окружности =  $L <BR>";
            echo "Площадь круга =  $S <BR>";
        } else {
            echo "Переменная не была задана";
        }
        ?>
    </BODY>
</HTML>
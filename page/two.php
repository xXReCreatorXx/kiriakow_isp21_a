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
        <H2 class="title">Задание №2</H2>
            
        <?php
        if ($_POST["array"] != "") {
            $a = (string)$_POST["array"];
            $s = 0;
            $p = 1;
            for ($i = 0; $i < strlen($a); $i++) {
                $s = $s + $a[$i];
                $p = $p * $a[$i];
            }
            echo "Сумма цифр = $s <BR>";
            echo "Произведение цифр =  $p <BR>";
        } else {
            echo "Переменная не была задана";
        }
        ?>
    </BODY>
</HTML>
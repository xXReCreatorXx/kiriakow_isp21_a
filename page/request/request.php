<?php
$id_user = $_SESSION["id"];

$sql_request = "SELECT request.*, 
                (SELECT name FROM services WHERE services.id = request.id_services) AS request_service,
                (SELECT src FROM services WHERE services.id = request.id_services) AS request_service_src,
                (SELECT alt FROM services WHERE services.id = request.id_services) AS request_service_alt,
                (SELECT name FROM oplata WHERE oplata.id = request.id_oplata) AS request_oplata,  
                (SELECT name FROM status WHERE status.id = request.id_status) AS request_status 
                FROM request WHERE $id_user = request.id_user ORDER BY id DESC";

$result_request = $conn->query($sql_request);
?>

<?php
if (isset($_POST["cancell_id"])) {
    $cancell_id = $_POST["cancell_id"];
    $sqlRequestUpdate = "UPDATE request SET id_status = 2, comment = 'По просьбе пользователя' WHERE id = $cancell_id";
    $conn->query($sqlRequestUpdate);

    header("Location:" . $_SERVER['REQUEST_URI']);
}
?>

<div class='conteiner'>

    <div class='header title_menu'>
        <h1 class='title_main'>Заявки</h1>

        <form class='fomr_add' action='request_add' method=''>
            <button class='button_add'><img class='add_svg' src='../svg/add.svg' /></button>
        </form>
    </div>

    <div class='content'>
        
        <?php
        if ($result_request != "") {
            foreach ($result_request as $value) {
                $datetime = explode(" ", $value["datetime"]);
                $date = date("d.m.Y", strtotime($datetime[0]));
                $time = date("H:i", strtotime($datetime[1]));
                echo "
                <div class='order_block'>
                    <form class='order_block_main' action='' method='POST'>
                        <div class='order_inf_block'>

                            <div class='order_img_block'>
                                <img class='order_img' src='" . $value["request_service_src"] . "' />
                            </div>

                            <div class='order_inf'>
                                <p class='inf'>" . $value["request_service"] . "</p>

                                <p class='inf'>" . $value["request_oplata"] . "</p>

                                <p class='inf'>" . $date . "</p>

                                <p class='inf'>" . $time . "</p>
                            </div>

                        </div>";

                        if ($value["request_status"] == "Новое") {
                            echo "<button class='order_button' name='cancell_id' value='" . $value["id"] . "'>Отменить</button>";
                        }

                    echo "</form>";

                    if (isset($value["comment"])) {
                        echo "<div class='order_block_status_comment status_cancel'>
                        <p class='status_inf'>" . $value["comment"] . "</p>
                    </div>";
                    }

                    echo "<div class='order_block_status'>
                        <p class='status_inf'>" . $value["request_status"] . "</p>
                    </div>
                </div>
                ";
            }
        }
        ?>

    </div>

</div>

<script src="JS/statusColor.js"></script>
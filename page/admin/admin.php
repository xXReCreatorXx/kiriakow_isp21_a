<?php
$sql_request = "SELECT request.*, 
                (SELECT name FROM users WHERE users.id = request.id_user) AS request_user_name,
                (SELECT phone FROM users WHERE users.id = request.id_user) AS request_user_phone,
                (SELECT name FROM services WHERE services.id = request.id_services) AS request_service,
                (SELECT src FROM services WHERE services.id = request.id_services) AS request_service_src,
                (SELECT alt FROM services WHERE services.id = request.id_services) AS request_service_alt,
                (SELECT name FROM oplata WHERE oplata.id = request.id_oplata) AS request_oplata,  
                (SELECT name FROM status WHERE status.id = request.id_status) AS request_status 
                FROM request ORDER BY id DESC";

$result_request = $conn->query($sql_request);
?>

<?php
if (isset($_GET["update_id"])) {
    require "components/adm_update_form.php";
}
?>

<div class="header title_menu">
    <h1 class="title_main">Админ панель</h1>
</div>

<div class="content">

    <?php
    if ($result_request != "") {
        foreach ($result_request as $value) {
            $datetime = explode(" ", $value["datetime"]);
            $date = date("d.m.Y", strtotime($datetime[0]));
            $time = date("H:i", strtotime($datetime[1]));
            echo '
            <div class="order_block">
                <form class="order_block_main order_block_main_admin" action="" method="GET">
                    <div class="order_inf_block order_inf_block_admin">

                        <div class="inf_admin inf_kli">
                            <div>
                                <div class="title_emp">Клиент</div>

                                <p class="inf">' . $value["request_user_name"] . '</p>
            
                                <p class="inf">' . $value["request_user_phone"] . '</p>
                            </div>

                            <button class="order_button order_button_admin" type="submit" name="update_id" value="' . $value["id"] . '">Изменить статус</button>
                        </div>

                        <div class="title_emp">Услуга</div>

                        <div class="inf_admin">
                            <div class="order_img_block">
                                <img class="order_img" src="' . $value["request_service_src"] . '" />
                            </div>
            
                            <div class="order_inf_admin">
                                <p class="inf">' . $value["request_service"] . '</p>

                                <p class="inf">' . $value["request_oplata"] . '</p>
            
                                <p class="inf">' . $date . '</p>
            
                                <p class="inf">' . $time . '</p>
                            </div>
                        </div>

                    </div>

                    
                </form>';

                if (isset($value["comment"])) {
                    echo "<div class='order_block_status_comment status_cancel'>
                    <p class='status_inf'>" . $value["comment"] . "</p>
                </div>";
                }

                echo '<div class="order_block_status">
                    <p class="status_inf">' . $value["request_status"] . '</p>
                </div>
            </div>
            ';
        }
    }
    ?>

</div>

<script src="JS/statusColor.js"></script>
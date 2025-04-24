<?php
$sql_user = "SELECT * FROM user WHERE id_role = 1";
$result_user = $conn->query($sql_user);

$sql_master = "SELECT * FROM master";
$result_master = $conn->query($sql_master);
?>

<?php
if (isset($_POST["user_id"]) && isset($_POST["master_id"]) && isset($_POST["date"]) && isset($_POST["time"])) {
    $user_id = $_POST["user_id"];
    $adress = $_POST["adress"];
    $phone = $_POST["phone"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $service = $_POST["service_id"];
    $oplata = $_POST["oplata_id"];
    
    $date = date("Y-m-d", strtotime($date));
    $time = date("H:i:s", strtotime($time));
    $datetime = $date . " " . $time;
    
    $sqlRequestInsert = "INSERT INTO request (id_user, id_master, id_status, booking_datetime) VALUES ($user_id, $master_id, 1, '$datetime')";
    $conn->query($sqlRequestInsert);
    
    header("Location:" . "/admin");
}
?>

<div class='header title_menu'>
    <h1 class='title_main'>Составление заявки</h1>
</div>

<form class='content' action="" method="POST">

    <div class='order_block'>
        <div class='order_block_main order_add_block_main'>
            
            <div class='title_order'>
                <p class='title_order_inf'>Пользователь</p>
            </div>

            <div class='order_block_input'>
                <select class='order_input' name='user_id'>
                    <?php
                    foreach ($result_user as $value) {
                        echo "
                        <option value='" . $value["id"] . "'>" . "id: " . $value["id"] . " | " . $value["full_name"] . "</option>
                        ";
                    }
                    ?>
                </select>
            </div>

        </div>
    </div>

    <div class='order_block'>
        <div class='order_block_main order_add_block_main'>
            
            <div class='title_order'>
                <p class='title_order_inf'>Мастер</p>
            </div>

            <div class='order_block_input'>
                <select class='order_input' name='master_id'>
                    <?php
                    foreach ($result_master as $value) {
                        echo "
                        <option value='" . $value["id"] . "'>" . $value["name"] . "</option>
                        ";
                    }
                    ?>
                </select>
            </div>

        </div>
    </div>

    <div class='order_block'>
        <div class='order_block_main order_add_block_main'>
            
            <div class='title_order'>
                <p class='title_order_inf'>Дата</p>
            </div>

            <div class='order_block_input'>
                <select class='order_input' name='date'>
                    <option value='03.02.2025'>03.02.2025</option>
                    <option value='06.02.2025'>06.02.2025</option>
                    <option value='09.02.2025'>09.02.2025</option>
                </select>
            </div>

        </div>
    </div>

    <div class='order_block'>
        <div class='order_block_main order_add_block_main'>
            
            <div class='title_order'>
                <p class='title_order_inf'>Время</p>
            </div>

            <div class='order_block_input'>
                <select class='order_input' name='time'>
                    <option value='8:00'>8:00</option>
                    <option value='9:00'>9:00</option>
                    <option value='10:00'>10:00</option>
                    <option value='11:00'>11:00</option>
                    <option value='12:00'>12:00</option>
                    <option value='13:00'>13:00</option>
                    <option value='14:00'>14:00</option>
                    <option value='15:00'>15:00</option>
                    <option value='16:00'>16:00</option>
                    <option value='17:00'>17:00</option>
                    <option value='18:00'>18:00</option>
                </select>
            </div>

        </div>
    </div>

    <button class='order_add_button'>Подтвердить</button>

</form>
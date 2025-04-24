<?php
$sql_service = "SELECT * FROM services";
$result_service = $conn->query($sql_service);

$sql_oplata = "SELECT * FROM oplata";
$result_oplata = $conn->query($sql_oplata);

$sql_datetime = "SELECT datetime FROM request";
$result_datetime = $conn->query($sql_datetime);
?>

<?php
if (isset($_POST["adress"])) {
    $user_id = $_SESSION["id"];
    $adress = $_POST["adress"];
    $phone = $_POST["phone"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $service = $_POST["service_id"];
    $oplata = $_POST["oplata_id"];

    $date = date("Y-m-d", strtotime($date));
    $time = date("H:i:s", strtotime($time));
    $datetime = $date . " " . $time;
    
    $sqlRequestInsert = "INSERT INTO request (id_user, id_services, id_status, id_oplata, user_phone, adress, datetime) 
                                    VALUES ($user_id, $service, 1, $oplata, '$phone', '$adress', '$datetime')";

    $conn->query($sqlRequestInsert);
    
    header("Location:" . "/order");
}
?>

<div class='header title_menu'>
    <h1 class='title_main'>Составление заявки</h1>
</div>

<form class='content' action="" method="POST">

    <div class='order_block'>
        <div class='order_block_main order_add_block_main'>
            
            <div class='title_order'>
                <p class='title_order_inf'>Ваш адрес</p>
            </div>

            <div class='order_block_input'>
                <input class='order_input' typr='text' name='adress' placeholder='Введите ваш адрес'/>
            </div>

        </div>
    </div>

    <div class='order_block'>
        <div class='order_block_main order_add_block_main'>
            
            <div class='title_order'>
                <p class='title_order_inf'>Ваш номер телофона</p>
            </div>

            <div class='order_block_input'>
                <input class='order_input' typr='text' name='phone' placeholder='Введите ваш номер телофона' value='<?php echo "" . $_SESSION["phone"] . "" ?>'/>
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

    <div class='order_block'>
        <div class='order_block_main order_add_block_main'>
            
            <div class='title_order'>
                <p class='title_order_inf'>Вид услуги</p>
            </div>

            <div class='order_block_input'>
                <select class='order_input' name='service_id'>
                    <?php
                    foreach ($result_service as $value) {
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
                <p class='title_order_inf'>Тип оплаты</p>
            </div>

            <div class='order_block_input'>
                <select class='order_input' name='oplata_id'>
                    <?php
                    foreach ($result_oplata as $value) {
                        echo "
                        <option value='" . $value["id"] . "'>" . $value["name"] . "</option>
                        ";
                    }
                    ?>
                </select>
            </div>

        </div>
    </div>

    <button class='order_add_button'>Подтвердить</button>

</form>
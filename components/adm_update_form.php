<?php
$update_id = $_GET["update_id"];

if (isset($_POST["update_status"])) {
    $update_status = $_POST["update_status"];
    if ($update_status == 2) {
        $update_comment = $_POST["comment"];
        $sqlRequestUpdate = "UPDATE request SET id_status = $update_status, comment = '$update_comment' WHERE id = $update_id";
        $conn->query($sqlRequestUpdate);
    } else {
        $sqlRequestUpdate = "UPDATE request SET id_status = $update_status, comment = NULL WHERE id = $update_id";
        $conn->query($sqlRequestUpdate);
    }

    header("Location:" . $request[0]);
}
?>

<form class="adm_update_form" action="" method="POST">
    <h2>Изменить статус записи №<?php echo $update_id; ?></h2>

    <textarea class="input input_admin" name="comment" placeholder="Комментарий" ></textarea>

    <button class="adm_update_form_button status_cancel" type="submit" name="update_status" value="2">Отменено</button>

    <button class="adm_update_form_button status_conf" type="submit" name="update_status" value="3">Подтверждено</button>

    <button class="adm_update_form_button status_process" type="submit" name="update_status" value="4">В работе</button>
</form>
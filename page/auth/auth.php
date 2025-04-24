<?php
$sql_users = "SELECT * FROM users";
$result_users = $conn->query($sql_users);

$error = NULL;

if (isset($_POST["login"]) && isset($_POST["password"])) {
    $login = $_POST["login"];
    $password = $_POST["password"];

    foreach($result_users as $value) {
        if ($login == $value["login"] && $password == $value["password"]) {
            $_SESSION["id"] = $value["id"];
            $_SESSION["id_role"] = $value["id_role"];
            $_SESSION["name"] = $value["name"];
            $_SESSION["phone"] = $value["phone"];
            header("Location:" . $_SERVER['REQUEST_URI']);
        } else {
            $error = "Возможно вы указали не верный логин или пароль";
        }
    }
}
?>

<div class='conteiner_login'>

    <form class="form_login" action="" method="POST" autocomplete="off">
        <h1 class="title">Вход</h1>

        <div class="input_block">
            <input class="input" type="text" name="login" placeholder="Логие" />

            <input class="input" type="password" name="password" placeholder="Пароль" />
        </div>

        <button class="button" type="submit">Войти</button>

    </form>

    <form class="form_relocate" action="registration" method="">
        <button class="button_relocate">Создать акккаунт</button>
    </form>

    <?php if (isset($error)) { echo "<p class='login_error'>$error</p>"; } ?>

</div>
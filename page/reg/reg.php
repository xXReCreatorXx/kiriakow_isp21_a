<?php
$sql_users = "SELECT * FROM users";
$result_users = $conn->query($sql_users);

$error = NULL;

function reg($array, $user_phone) {
    $reg = null;
    foreach ($array as $value) {
        if ($user_phone == $value["phone"]) {
            $reg = TRUE;

            break;
        } else {
            $reg = FALSE;
        }
    }
    return $reg;
}

if (isset($_POST["name"]) && isset($_POST["phone"]) && isset($_POST["login"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confirm"])) {
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $login = $_POST["login"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm = $_POST["confirm"];

    if ($name !== "" && $phone !== "" && $login !== "" && $email !== "" && $password !== "" && $confirm !== "") {
        if ($password === $confirm) {
            if (reg($result_users, $phone) !== TRUE) {
                $sqlUserInsert = "INSERT INTO users SET name = '$name', login = '$login', password = '$password', email = '$email', phone = '$phone'";
                $conn->query($sqlUserInsert);

                header("Location:" . "/authorization");
            } else {
                $error = "Пользователь с данным номером телефона уже существует";
            }
        } else {
            $error = "Пароли не совпадают";
        }
    } else {
        $error = "Все поля должны быть заполнены";
    }
}
?>

<div class='conteiner_login'>

    <form class="form_login" action="" method="POST" autocomplete="off">
        <h1 class="title">Регистрация</h1>

        <div class="input_block">
            <input class="input" type="text" name="name" placeholder="ФИО" />

            <input class="input" type="phone" name="phone" placeholder="Номер телефона" />

            <input class="input" type="text" name="login" placeholder="Логин" />

            <input class="input" type="email" name="email" placeholder="Email" />

            <input class="input" type="password" name="password" placeholder="Пароль" />

            <input class="input" type="password" name="confirm" placeholder="Подтверждение пароля" />
        </div>

        <button class="button" type="submit">Зарегистрироваться</button>

    </form>

    <form class="form_relocate" action="authorization" method="">
        <button class="button_relocate">Уже зарегистрирован</button>
    </form>

    <?php if (isset($error)) { echo "<p class='login_error'>$error</p>"; } ?>

</div>
<?php
if (isset($_SESSION["id"])) {
    if ($_SESSION["id_role"] == 2) {
        switch($request[0]) {

            case "request":
                require "page/request/request.php";

                break;

            case "request_add":
                require "page/request_add/request_add.php";

                break;

            default:
                header("Location: /request");

                break;
        } 
    } else {
        switch($request[0]) {

            case "admin":
                require "page/admin/admin.php";

                break;

            case "admin_request_add":
                require "page/admin_request_add/admin_request_add.php";

                break;

            default:
                header("Location: /admin");

                break;
        }
    }   
} else {
    switch ($request[0]) {
        case "registration":
            require "page/reg/reg.php";

            break;

        case "authorization":
            require "page/auth/auth.php";

            break;

        default:
            header("Location: /registration");

            break;
    }
}
?>
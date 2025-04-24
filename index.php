<?php
session_start();

$conn = new mysqli("localhost", "kiriakow", "aBXrQBA796", "demekz");
if($conn->connect_error) {
    die("Ошибка!: " . $conn->connect_error);
}

$method = $_SERVER["REQUEST_METHOD"];
$request = explode("/", str_replace("?", "/", trim($_SERVER["REQUEST_URI"], "?/")));

require "page/main.php";
?>
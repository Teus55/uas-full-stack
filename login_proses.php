<?php
session_start();
header("Access-Control-Allow-Origin: *");
require_once("class/login.php");
$objLogin = new login();
$idlogin = $objLogin->Login($_POST['username'], $_POST['password']);
if ($idlogin == true) {
    $_SESSION['username'] = $_POST['username'];
    echo "Berhasil";
} else
    echo "Gagal";

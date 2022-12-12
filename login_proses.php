<?php
session_start();
header("Access-Control-Allow-Origin: *");
require_once("class/login.php");
$objLogin = new login();
$idlogin = $objLogin->Login($_POST['username'], $_POST['password']);
$row = $idlogin->fetch_assoc();
if ($row) {
    $_SESSION['username'] = $_POST['username'];
    echo "Berhasil";
} else {
    echo "Gagal";
}

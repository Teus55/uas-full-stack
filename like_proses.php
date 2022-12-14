<?php
header("Access-Control-Allow-Origin: *");
require_once("class/like.php");
$objLike = new like();
$idlike = $objLike->Likes($_POST['idusr'], $_POST['idkont']);
$row = $idlike->fetch_assoc();
// if (!$row) {
    // insert
    $objLike->insertLike($_POST['idusr'], $_POST['idkont']);
    $idlike = $objLike->getLikePerMeme($_POST['idkont']);
    $row = $idlike->fetch_assoc();
    echo $row['COUNT(idkonten)'];
// }

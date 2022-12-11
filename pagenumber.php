<?php
require_once("class/konten.php");
$objKonten = new konten();
$objKonten->__construct();
$jumlah = $objKonten->getJumlahKonten();
$output = '';
$limit = 12;
$page = "";
if (isset($_POST['page_no']))
    $page = $_POST['page_no'];
else
    $page = 1;
$offset = ($page - 1) * $limit;
if ($jumlah > 0) {
    $output .= "<ul class='gallery'>";
    $res = $objKonten->getKonten($offset, $limit);
    $i = 1;
    while ($row = $res->fetch_assoc()) {
        $output .= "<li id='konten$i'>
    <img src='" . $row['image'] . "'><input type='hidden' name='idkonten'><br>
    <button type='button' onclick='alert('Hello world!')'>Click Me!</button> <span>100 likes</span>
    </li>";
        $i++;
    }
    $output .= "</ul>
    <div id='pagenumber'>";
    $jumlah_konten = $objKonten->getJumlahKonten();
    $total_page = ceil($jumlah_konten/$limit);
    for ($j=1;$j <= $total_page; $j++){
        if ($j == $page)
        $class_name = "active";
        else
        $class_name = "";
        $output .= "<a class='$class_name' id='$j'>$j</a>&nbsp;";
    }
    $output .= "</div>";
    echo $output;
}

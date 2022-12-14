<?php
require_once("class/konten.php");
$objKonten = new konten();
$objKonten->__construct();
$jumlah = $objKonten->getJumlahKonten();
$output = '';
$limit = 12;
$page = "";
$iduser = $_POST['iduser'];

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
        $idkonten_ = $row['idkonten'];
        // ambil like dan append ke span
        $jumLikes = 0;
        require_once("class/like.php");
        $objLike = new like();
        $objLike->__construct();
        $res_like = $objLike->getLikePerMeme($idkonten_);
        while ($row_l = $res_like->fetch_assoc()) {
            $jumLikes = $row_l['COUNT(idkonten)'];

        }

        $ceklike = $objLike->Likes($iduser, $idkonten_);
        if  ($row2 = $ceklike->fetch_assoc()) {
            $disabled = "disabled";
        } else {
            $disabled = "";
        }

        $output .= "<li id='konten$i'>
    <img src='" . $row['image'] . "'><br>
    <button type='button' id='btnkonten".$row['idkonten']."' $disabled value='" . $row['idkonten'] . "' onclick='f1(this)'><i class='fa fa-heart' style='font-size:18px;color:red'></i></button> 
    <span id='idkonten".$row['idkonten']."'>$jumLikes likes</span>
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

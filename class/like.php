<?php
require_once("parent.php");
class like extends orangtua
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insertLike($username, $idkonten){
        // insert like
        $sql = "insert into likes (username, idkonten) VALUES (?, ?)";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("si", $username, $idkonten);
        $stmt->execute();
        $res = $stmt->get_result();
        return $res;
    }

    public function getLike($idkonten) // tidak kepakai
    {
        $sql = "Select * From like Where idkonten=?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("i", $idkonten);
        $stmt->execute();
        $res = $stmt->get_result();
        return $res;
    }

    public function getLikePerMeme($idkonten) // mengambil jumlah like per meme
    {

        $sql = "select COUNT(idkonten) FROM likes WHERE idkonten=?;";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("i", $idkonten);
        $stmt->execute();
        $res = $stmt->get_result();
        return $res;
    }

    public function Likes($idusr, $idkont) // pengecekan apakah user sudah pernah nge like
    {
        $sql = "SELECT * FROM likes WHERE username=? AND idkonten=?";
        $stmt = $this->mysqli->prepare(($sql));
        $stmt->bind_param("si", $idusr, $idkont);
        $stmt->execute();
        return $stmt->get_result();
    }
}
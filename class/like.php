<?php
require_once("parent.php");
class like extends orangtua
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insertLike($username, $idkonten){
        $sql = "insert into like (username, idkonten) VALUES (?, ?)";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("si", $username, $idkonten);
        $stmt->execute();
        $res = $stmt->get_result();
        return $res;
    }

    public function getLike($idkonten)
    {
        $sql = "Select * From like Where idkonten=?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("i", $idkonten);
        $stmt->execute();
        $res = $stmt->get_result();
        return $res;
    }
}
<?php
require_once("parent.php");

class konten extends orangtua
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getJumlahKonten()
    {
        $res = $this->getKonten();
        return $res->num_rows;
    }

    public function getKonten($offset = null, $limit = null)
    {
        $sql = "Select * From konten";
        if (!is_null($offset)) {
            $sql .= " Limit ?,?";
        }
        $stmt = $this->mysqli->prepare($sql);
        if (!is_null($offset)) {
            $stmt->bind_param("ii", $offset, $limit);
        }
        $stmt->execute();
        $res = $stmt->get_result();
        return $res;
    }
}





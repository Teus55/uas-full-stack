<?php
require_once("parent.php");
class login extends orangtua
{
    public function __construct()
    {
        parent::__construct();
    }

    public function Login($username, $password)
    {
        $sql = "SELECT * FROM user WHERE username=? AND password=?";
        $stmt = $this->mysqli->prepare(($sql));
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        return $stmt->get_result();
    }
}

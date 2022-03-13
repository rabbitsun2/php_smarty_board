<?php

class DAO{
    
    private $conn;

    public function __construct(){
        $this->conn = null;
    }

    public function __destruct(){
        unset($this->conn);
    }

    public function getConn(){
        return $this->conn;
    }

    public function setConn($conn){
        $this->conn = $conn;
    }

}

?>
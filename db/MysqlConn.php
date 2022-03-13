<?php

class MysqlConn{

    private $mysqli;
    private $hostname;
    private $username;
    private $passwd;
    private $dbname;

    public function __construct(){
        $this->mysqli = null;
        $this->hostname = null;
        $this->username = null;
        $this->passwd = null;
        $this->dbname = null;
    }

    public function __destruct(){

        if($this->mysqli != null){
            unset($this->mysqli);
        }

    }

    public function init($hostname, $username, $passwd, $dbname){
        
        //mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT );

        $this->hostname = $hostname;
        $this->username = $username;
        $this->passwd = $passwd;
        $this->dbname = $dbname;

        $this->mysqli = new mysqli($hostname, $username, $passwd, $dbname);

        $this->connCheck();

    }

    public function getMysqli(){
        return $this->mysqli;
    }

    public function setMysqli($mysqli){
        $this->mysqli = $mysqli;
    }

    private function connCheck(){

        // 연결 확인

        
        if ( $this->mysqli->connect_error ){
            echo "Connect failed: " . $this->mysqli->connect_error . "<br>";
        }
        
    }

    public function close(){

        $this->mysqli->close();

    }

}

?>
<?php

class Controller {

    private $root_dir;
    private $upload_dir;
    private $smarty;
    private $conn;

    private $root_route;
    private $second_route;
    private $third_route;

    public function __contruct(){
        $this->root_dir = null;
        $this->smarty = null;
    }

    public function __destruct(){
        unset($this->smarty);
    }
    
    public function getRootDir(){
        return $this->root_dir;
    }

    public function setRootDir($root_dir){
        $this->root_dir = $root_dir;
    }

    public function getUploadDir(){
        return $this->upload_dir;
    }

    public function setUploadDir($upload_dir){
        $this->upload_dir = $upload_dir;
    }

    public function getSmarty(){
        return $this->smarty;
    }

    public function setSmarty($smarty){
        $this->smarty = $smarty;
    }

    public function getConn(){
        return $this->conn;
    }

    public function setConn($conn){
        $this->conn = $conn;
    }

    public function getRootRoute(){
        return $this->root_route;
    }

    public function setRootRoute($root_route){
        $this->root_route = $root_route;
    }

    public function getSecondRoute(){
        return $this->second_route;
    }

    public function setSecondRoute($second_route){
        $this->second_route = $second_route;
    }

    public function getThirdRoute(){
        return $this->third_route;
    }

    public function setThirdRoute($third_route){
        $this->third_route = $third_route;
    }

}

?>
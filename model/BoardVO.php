<?php

class BoardVO{

    private $id;
    private $subject;
    private $memo;
    private $username;
    private $passwd;
    private $ip;
    private $cnt;
    private $regidate;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getSubject(){
        return $this->subject;
    }

    public function setSubject($subject){
        $this->subject = $subject;
    }

    public function getMemo(){
        return $this->memo;
    }

    public function setMemo($memo){
        $this->memo = $memo;
    }

    public function getUsername(){
        return $this->username;
    }

    public function setUsername($username){
        $this->username = $username;
    }

    public function getPasswd(){
        return $this->passwd;
    }

    public function setPasswd($passwd){
        $this->passwd = $passwd;
    }

    public function getIp(){
        return $this->ip;
    }

    public function setIp($ip){
        $this->ip = $ip;
    }

    public function getCnt(){
        return $this->cnt;
    }

    public function setCnt($cnt){
        $this->cnt = $cnt;
    }

    public function getRegidate(){
        return $this->regidate;
    }

    public function setRegidate($regidate){
        $this->regidate = $regidate;
    }

}

?>
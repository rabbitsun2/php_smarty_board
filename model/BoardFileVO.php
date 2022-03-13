<?php

class BoardFileVO{

    private $id;
    private $article_id;
    private $file_name;
    private $original_name;
    private $file_size;
    private $file_ext;
    private $file_type;
    private $regidate;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getArticle_id(){
        return $this->article_id;
    }

    public function setArticle_id($article_id){
        $this->article_id = $article_id;
    }

    public function getFile_name(){
        return $this->file_name;
    }

    public function setFile_name($file_name){
        $this->file_name = $file_name;
    }

    public function getOriginal_name(){
        return $this->original_name;
    }

    public function setOriginal_name($original_name){
        $this->original_name = $original_name;
    }

    public function getFile_size(){
        return $this->file_size;
    }

    public function setFile_size($file_size){
        $this->file_size = $file_size;
    }

    public function getFile_ext(){
        return $this->file_ext;
    }

    public function setFile_ext($file_ext){
        $this->file_ext = $file_ext;
    }

    public function getFile_type(){
        return $this->file_type;
    }

    public function setFile_type($file_type){
        $this->file_type = $file_type;
    }

    public function getRegidate(){
        return $this->regidate;
    }

    public function setRegidate($regidate){
        $this->regidate = $regidate;
    }

}

?>
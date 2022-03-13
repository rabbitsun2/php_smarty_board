<?php

    class BoardServiceImpl implements BoardService{

        private $boardDAO;
        private $conn;
        private $boardname;

        public function __contruct(){
            $this->boardDAO = null;
        }

        public function __destruct(){
            
            if ($this->boardDAO != null ){
                unset($this->boardDAO);
            }
        }

        public function getConn(){
            return $this->conn;
        }

        public function setConn($conn){
            $this->conn = $conn;
        }

        public function getBoardname(){
            return $this->boardname;
        }

        public function setBoardname($boardname){
            $this->boardname = $boardname;
        }

        private function loadDAO(){
            $this->boardDAO = new BoardDAOImpl();

            $my_conn = $this->getConn();
            $boardname = $this->getBoardname();

            $this->boardDAO->setConn($my_conn);
            $this->boardDAO->setBoardname($boardname);
        }

        public function selectBoard(){
            $this->loadDAO();
            return $this->boardDAO->selectBoard();
        }

        public function insertBoard($boardVO){
            $this->loadDAO();
            return $this->boardDAO->insertBoard($boardVO);
        }

        public function selectView($boardVO){
            $this->loadDAO();
            return $this->boardDAO->selectView($boardVO);
        }

        public function deleteBoard($boardVO){
            $this->loadDAO();
            return $this->boardDAO->deleteBoard($boardVO);
        }

        public function selectFullQryView($boardVO){
            $this->loadDAO();
            return $this->boardDAO->selectFullQryView($boardVO);
        }

        public function insertBoardFile($boardFileVO){
            $this->loadDAO();
            return $this->boardDAO->insertBoardFile($boardFileVO);
        }

        public function selectBoardFile($boardFileVO){
            $this->loadDAO();
            return $this->boardDAO->selectBoardFile($boardFileVO);
        }

        public function selectBoardFileDetail($boardFileVO){
            $this->loadDAO();
            return $this->boardDAO->selectBoardFileDetail($boardFileVO);
        }

        public function deleteBoardFile($boardFileVO){
            $this->loadDAO();
            return $this->boardDAO->deleteBoardFile($boardFileVO);
        }

        public function updateBoard($boardVO){
            $this->loadDAO();
            return $this->boardDAO->updateBoard($boardVO);
        }

        public function selectAllBoardCount(){
            $this->loadDAO();
            return $this->boardDAO->selectAllBoardCount();
        }

        public function selectPagingBoard($startNum, $endNum){
            $this->loadDAO();
            return $this->boardDAO->selectPagingBoard($startNum, $endNum);
        }

    }


?>
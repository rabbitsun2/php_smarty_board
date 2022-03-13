<?php

interface BoardDAO{

    public function selectBoard();
    public function insertBoard($boardVO);
    public function selectView($boardVO);
    public function deleteBoard($boardVO);
    public function selectFullQryView($boardVO);
    public function insertBoardFile($boardFileVO);
    public function selectBoardFile($boardFileVO);
    public function selectBoardFileDetail($boardFileVO);
    public function deleteBoardFile($boardFileVO);
    public function updateBoard($boardVO);
    public function selectAllBoardCount();
    public function selectPagingBoard($startNum, $endNum);

}

?>
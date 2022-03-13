<?php

class BoardDAOImpl implements BoardDAO{

    private $conn;
    private $boardname;

    private $TEST_QRY = "SELECT * FROM ";

    private $BOARD_QRY = "";
    private $EMPLOYEE_QRY = "";
    private $INSERT_QRY = "";
    private $SELECT_VIEW_QRY = "";
    private $SELECT_FULL_VIEW_QRY = "";
    private $DELETE_BOARD_QRY = "";
    private $INSERT_BOARD_FILE_QRY = "";
    private $SELECT_BOARD_FILE_QRY = "";
    private $SELECT_BOARD_FILE_VIEW_QRY = "";
    private $DELETE_BOARD_FILE_QRY = "";
    private $UPDATE_BOARD_QRY = "";
    private $SELECT_BOARD_ALL_COUNT_QRY = "";
    private $SELECT_BOARD_PAGING_QRY = "";

    private function loadQuery(){

        $boardname = $this->getBoardname();

        $this->BOARD_QRY = "SELECT * FROM cakeon_board_" . $boardname;
        $this->EMPLOYEE_QRY = "SELECT * FROM employee";
        $this->INSERT_QRY = "INSERT INTO cakeon_board_" . $boardname . "(" . 
                            "subject, memo, username, passwd, ip, cnt, regidate) " .
                            "VALUES(?, ?, ?, ?, ?, ?, ?)";
        $this->SELECT_VIEW_QRY = "SELECT * FROM cakeon_board_" . $boardname . " " .
                                    "WHERE id = ?";
    
        $this->SELECT_FULL_VIEW_QRY = "SELECT * FROM cakeon_board_" . $boardname . " " .
                                        "WHERE subject = ? and " . 
                                        "memo = ? and " . 
                                        "username = ? and " . 
                                        "passwd = ? and " . 
                                        "ip = ? and " . 
                                        "cnt = ? and " . 
                                        "regidate = ?";
    
        $this->DELETE_BOARD_QRY = "DELETE FROM cakeon_board_" . $boardname . " " . 
                            "WHERE id = ? and passwd = ?";
    
        $this->INSERT_BOARD_FILE_QRY = "INSERT INTO cakeon_board_file_" . $boardname . "(" . 
                                        "article_id, file_name, original_name, file_size, " . 
                                        "file_ext, file_type, regidate) " . 
                                        "VALUES(?, ?, ?, ?, ?, ?, ?)";
    
        $this->SELECT_BOARD_FILE_QRY = "SELECT * FROM cakeon_board_file_" . $boardname . " " . 
                                        "WHERE article_id = ? ORDER BY id";
    
        $this->SELECT_BOARD_FILE_VIEW_QRY = "SELECT * FROM cakeon_board_file_" . $boardname . " " . 
                                             "WHERE id = ?";
    
        $this->DELETE_BOARD_FILE_QRY = "DELETE FROM cakeon_board_file_" . $boardname . " " .
                                        "WHERE article_id = ?";

        $this->UPDATE_BOARD_QRY = "UPDATE cakeon_board_" . $boardname . " SET " . 
                                   "subject = ?, " . 
                                   "memo = ?, " . 
                                   "username = ? " . 
                                   "WHERE id = ?";

        $this->SELECT_BOARD_ALL_COUNT_QRY = "SELECT COUNT(*) as 'cnt' FROM cakeon_board_" . $boardname;
        
        $this->SELECT_BOARD_PAGING_QRY = "SELECT * FROM cakeon_board_" . $boardname . " " .
                                        "ORDER by id desc " . 
                                        "LIMIT ? OFFSET ?";

    }

    public function __construct(){
        
    }

    public function __destruct(){
        
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

    public function selectBoard(){

        //$boardArr = null;
        $rows = null;
        $my_conn = $this->getConn();
        $result = null;

        $this->loadQuery();

        if ( $my_conn != null ){
//            echo "DB-참<br>";

            $mysqlConn = $my_conn->getMysqli();

            if ($result = $mysqlConn->query($this->BOARD_QRY)){
            //if ($result = $mysqlConn->query($this->EMPLOYEE_QRY)){
//                echo "DB-참2<br>";
//                print_r($result);
//                echo "<br>";
                
                
                //while($row = $result->fetch_object() ){
                    
                    /*
                    if ($boardArr == null){
                        $boardArr = array();
                    }

                    
                    $boardVO = new BoardVO();

                    $boardVO->setId($row->id);
                    $boardVO->setSubject($row->subject);
                    $boardVO->setMemo($row->memo);
                    $boardVO->setUsername($row->username);
                    $boardVO->setPasswd($row->passwd);
                    $boardVO->setIp($row->ip);
                    $boardVO->setRegidate($row->regidate);
                    */

//                    echo "DB-참3,";
                    /*
                    $line = $row["id"];
                    $line = $line . "," . $row["subject"];
                    $line = $line . "," . $row["username"];
                    */
                    
                    /*
                    $line = $row->id . "," . $row->first_name;
                    $line = $line . "<br>";

                    echo $line;
                    */

                    //array_push($boardArr, $row);
                    

                //}

                //$rows = $result->fetch_array();
                while($row = $result->fetch_assoc()){
                    $rows[] = $row;
                }
                
            }

            //print_r($boardArr);

            $result->close();
            
        }else{
            //echo "DB-거짓";
        }

        //return $boardArr;
        return $rows;

    }

    public function insertBoard($boardVO){

        $my_conn = $this->getConn();
        $result = null;
        
        $this->loadQuery();

        if($my_conn != null ){
            
            $mysqlConn = $my_conn->getMysqli();
            //echo $this->INSERT_QRY;
            $stmt = $mysqlConn->prepare($this->INSERT_QRY);

            //print_r($boardVO);

            $stmt->bind_param("sssssis", $subject, 
                            $memo,
                            $username,
                            $passwd,
                            $ip,
                            $cnt,
                            $regidate);

            $subject = $boardVO->getSubject();
            $memo = $boardVO->getMemo();
            $username = $boardVO->getUsername();
            $passwd = $boardVO->getPasswd();
            $ip = $boardVO->getIp();
            $cnt = $boardVO->getCnt();
            $regidate = $boardVO->getRegidate();

            //echo $ip;

            $stmt->execute();
            //$stmt->close();
            
            return 1;
        }

        return 0;

    }

    public function selectView($boardVO){

        $my_conn = $this->getConn();
        $result = null;
        $rows = null;

        $this->loadQuery();

        if($my_conn != null ){
            
            $mysqlConn = $my_conn->getMysqli();
            //echo $this->INSERT_QRY;
            $stmt = $mysqlConn->prepare($this->SELECT_VIEW_QRY);

            //echo $this->SELECT_VIEW_QRY;
            //print_r($boardVO);

            $stmt->bind_param("i", $id);
            
            $id = $boardVO->getId();

            echo $id . "할로<br>";

            $stmt->execute();

            $result = $stmt->get_result();
            
            if ( $result->num_rows == 1 ){
                //echo "참";

                /*
                while( $row = $result->fetch_assoc() ){
                    $rows[] = $row;
                }
                */

                $rows = $result->fetch_assoc();
                
                //echo $result->num_rows . "/";
                //print_r($rows);
                //echo "<br>";

            }

            $stmt->close();

            //print_r($rows);

        }

        return $rows;

    }

    public function deleteBoard($boardVO){

        $my_conn = $this->getConn();

        $this->loadQuery();
        
        //echo "참1 <br>";
        if($my_conn != null ){
            
            $mysqlConn = $my_conn->getMysqli();
            
            // 트랜젝션
            $mysqlConn->begin_transaction();

            //echo "참2 - mysqlConn<br>";
            
            try{
                //echo $this->DELETE_QRY;
                $stmt = $mysqlConn->prepare($this->DELETE_BOARD_QRY);

                //print_r($boardVO);

                $stmt->bind_param("is", $id, $passwd);
                $id = $boardVO->getId();
                $passwd = $boardVO->getPasswd();

                $stmt->execute();

                $mysqlConn->commit();

            }catch(mysqli_sql_exception $exception){

                $mysqlConn->rollback();
                throw $exception;
                return 0;

            }


        }

        return 1;

    }

    public function selectFullQryView($boardVO){

        $my_conn = $this->getConn();
        $result = null;
        $rows = null;

        $this->loadQuery();

        if($my_conn != null ){
            
            $mysqlConn = $my_conn->getMysqli();
            //echo $this->INSERT_QRY;
            $stmt = $mysqlConn->prepare($this->SELECT_FULL_VIEW_QRY);

            //print_r($boardVO);

            $stmt->bind_param("sssssis", $subject, 
                                    $memo,
                                    $username,
                                    $passwd,
                                    $ip,
                                    $cnt,
                                    $regidate);
            
            $subject = $boardVO->getSubject();
            $memo = $boardVO->getMemo();
            $username = $boardVO->getUsername();
            $passwd = $boardVO->getPasswd();
            $ip = $boardVO->getIp();
            $cnt = $boardVO->getCnt();
            $regidate = $boardVO->getRegidate();

            $stmt->execute();

            $result = $stmt->get_result();
            
            if ( $result->num_rows == 1 ){
                
                $rows = $result->fetch_assoc();
                
                //echo $result->num_rows . "/";
                //print_r($rows);
                //echo "<br>";

            }

            $stmt->close();

            //print_r($rows);

        }

        return $rows;

    }
    
    public function insertBoardFile($boardFileVO){

        $my_conn = $this->getConn();
        $result = null;

        $this->loadQuery();

        if($my_conn != null ){
            
            $mysqlConn = $my_conn->getMysqli();
            //echo $this->INSERT_QRY;
            $stmt = $mysqlConn->prepare($this->INSERT_BOARD_FILE_QRY);

            //print_r($boardVO);

            $stmt->bind_param("sssisss", 
                            $article_id, 
                            $file_name,
                            $original_name,
                            $file_size,
                            $file_ext,
                            $file_type,
                            $regidate);

            $article_id = $boardFileVO->getArticle_id();
            $file_name = $boardFileVO->getFile_name();
            $original_name = $boardFileVO->getOriginal_name();
            $file_size = $boardFileVO->getFile_size();
            $file_ext = $boardFileVO->getFile_ext();
            $file_type = $boardFileVO->getFile_type();
            $regidate = $boardFileVO->getRegidate();

            //echo "결과:" . $boardFileVO->getArticle_id() . "/" . $this->INSERT_BOARD_FILE_QRY . "<br>";
            //echo $ip;

            $stmt->execute();
            //$stmt->close();
            
            return 1;
        }

        return 0;

    }

    public function selectBoardFile($boardFileVO){

        //$boardArr = null;
        $rows = null;
        $my_conn = $this->getConn();
        $result = null;

        $this->loadQuery();

        if ( $my_conn != null ){
    
            $mysqlConn = $my_conn->getMysqli();

            $stmt = $mysqlConn->prepare($this->SELECT_BOARD_FILE_QRY);

            //print_r($boardFileVO);

            $stmt->bind_param("i", $article_id);
            $article_id = $boardFileVO->getArticle_id();
            $stmt->execute();
            
            $result = $stmt->get_result();

            while($row = $result->fetch_assoc()){
                $rows[] = $row;
            }
            
            
        }else{
            //echo "DB-거짓";
        }

        //return $boardArr;
        return $rows;

    }

    public function selectBoardFileDetail($boardFileVO){

        $my_conn = $this->getConn();
        $result = null;
        $rows = null;

        $this->loadQuery();

        if($my_conn != null ){
            
            $mysqlConn = $my_conn->getMysqli();
            $stmt = $mysqlConn->prepare($this->SELECT_BOARD_FILE_VIEW_QRY);

            $stmt->bind_param("i", $id);
            
            $id = $boardFileVO->getId();

            $stmt->execute();

            $result = $stmt->get_result();
            
            if ( $result->num_rows == 1 ){
                $rows = $result->fetch_assoc();
            }

            $stmt->close();

        }

        return $rows;

    }

    public function deleteBoardFile($boardFileVO){
        
        $my_conn = $this->getConn();

        $this->loadQuery();
        
        //echo "참1 <br>";
        if($my_conn != null ){
            
            $mysqlConn = $my_conn->getMysqli();
            
            // 트랜젝션
            $mysqlConn->begin_transaction();

            //echo "참2 - mysqlConn<br>";
            
            try{
                //echo $this->DELETE_QRY;
                $stmt = $mysqlConn->prepare($this->DELETE_BOARD_FILE_QRY);

                //print_r($boardVO);

                $stmt->bind_param("i", $article_id);
                $article_id = $boardFileVO->getArticle_id();

                $stmt->execute();

                $mysqlConn->commit();

            }catch(mysqli_sql_exception $exception){

                $mysqlConn->rollback();
                throw $exception;

                return 0;
            }

        }

        return 1;

    }

    public function updateBoard($boardVO){

        $my_conn = $this->getConn();

        $this->loadQuery();
        
        //echo "참1 <br>";
        if($my_conn != null ){
            
            $mysqlConn = $my_conn->getMysqli();
            
            // 트랜젝션
            $mysqlConn->begin_transaction();

            //echo "참2 - mysqlConn<br>";
            
            try{
                //echo $this->DELETE_QRY;
                $stmt = $mysqlConn->prepare($this->UPDATE_BOARD_QRY);

                //print_r($boardVO);

                $stmt->bind_param("sssi", $subject,
                                $memo,
                                $username,
                                $id);

                $subject = $boardVO->getSubject();
                $memo = $boardVO->getMemo();
                $username = $boardVO->getUsername();
                $id = $boardVO->getId();

                $stmt->execute();

                $mysqlConn->commit();

            }catch(mysqli_sql_exception $exception){

                $mysqlConn->rollback();
                throw $exception;

                return 0;
            }

        }

        return 1;

    }

    public function selectAllBoardCount(){

        $my_conn = $this->getConn();
        $result = null;
        $rows = null;

        $this->loadQuery();

        if($my_conn != null ){
            
            $mysqlConn = $my_conn->getMysqli();
            $stmt = $mysqlConn->prepare($this->SELECT_BOARD_ALL_COUNT_QRY);
            
            $stmt->execute();

            $result = $stmt->get_result();
            
            if ( $result->num_rows == 1 ){
                $rows = $result->fetch_assoc();
            }

            $stmt->close();

        }

        return $rows;

    }

    public function selectPagingBoard($startNum, $endNum){

        //$boardArr = null;
        $rows = null;
        $my_conn = $this->getConn();
        $result = null;

        $this->loadQuery();

        if ( $my_conn != null ){
    
            $mysqlConn = $my_conn->getMysqli();
            $stmt = $mysqlConn->prepare($this->SELECT_BOARD_PAGING_QRY);

            //print_r($boardFileVO);

            $stmt->bind_param("ii", $_limnum, $_startnum);
            
            // 오라클 페이징(자바 버전)
	    	//paramMap.put("startnum", startnum);		
    		//paramMap.put("endnum", endnum);			
		
            // mariaDB 페이징
            if ( $startNum === 1) {
                $_startnum = 0;
            }
            else {
                $_startnum = $startNum - 1;
            }
            
            $_limnum = ( $endNum - $startNum ) + 1;

            $stmt->execute();
            $result = $stmt->get_result();

            while($row = $result->fetch_assoc()){
                $rows[] = $row;
            }
            
            
        }else{
            //echo "DB-거짓";
        }

        //return $boardArr;
        return $rows;

    }

}

?>
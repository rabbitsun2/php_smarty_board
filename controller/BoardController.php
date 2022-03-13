<?php

    class BoardController extends Controller {

        private $board_service;

        public function __contruct(){
            $this->board_service = null;
        }

        public function __destruct(){
            
            if($this->board_service != null){
                unset($this->board_service);
            }
            
        }

        private function loadService(){
            $this->board_service = new BoardServiceImpl();
            
            $my_conn = $this->getConn();
            $boardname = $this->getThirdRoute();

            $this->board_service->setConn($my_conn);
            $this->board_service->setBoardname($boardname);
        }

        private function templateDir(){
            $smarty = $this->getSmarty();
            $root_dir = $this->getRootDir();
            $smarty->template_dir = $root_dir . '/view/board';
            $this->setSmarty($smarty);
        }

        private function getBoardname(){
            return $this->getThirdRoute();
        }

        public function list($pageCri){

            //require_once $this->root_dir . "/view/board/list.php";
            
            //echo "<br>";
            //echo "참5/목록<br>";
            
            $boardname = $this->getBoardname();
            $total_cnt = -1;
            
            $this->templateDir();
            $this->loadService();

            /*
            if($this->smarty != null){
                echo "스마티: 참/" . $this->smarty->template_dir;
                print_r($this->smarty->template_dir);
            }else{
                echo "스마티: 거짓";
            }
            */

            /*
            if ( $this->board_service != null ){
                echo "서비스:참";
            }else{
                echo "서비스:거짓";
            }
            */

            $paging = new Paging();

            $boardCnt = $this->board_service->selectAllBoardCount();
            $total_cnt = $boardCnt['cnt'];

            //echo $pageCri->getPage() . "/" . "<br>";
            //echo $total_cnt;

            $page_no = $pageCri->getPage();	// 현재 페이지
            $page_size = $pageCri->getPerPageNum();	// 단위 페이지
            
            $paging->setPageNo($page_no);
            $paging->setPageSize($page_size);
            $paging->setTotalCount($total_cnt);
            
            $pagingObj = $paging->getObject();

            $startnum = $paging->getDbStartNum();
            $endnum = $paging->getDbEndNum();

            
            //$boardList = $this->board_service->selectBoard(); // 게시물 전체 출력
            $boardList = $this->board_service->selectPagingBoard($startnum, $endnum);

            //$hello_rows = array();
            //$hello_rows['id'] = 111;

            //echo "DB 시작종료번호:" . $startnum . "/" . $endnum . "<br>";

            //print_r($boardList);

            print_r($pagingObj);
            echo "V4 UUID: " . UUID::v1() . '<br/>';

            $smarty = $this->getSmarty();

            $smarty->clearAllCache();

            $smarty->assign("title", "Hello World");
            $smarty->assign("boardList", $boardList);
            $smarty->assign("boardname", $boardname);
            $smarty->assign("pagingObj", $pagingObj);
            $smarty->display('list.tpl');

        }

        public function write(){

            $this->templateDir();
            $this->loadService();
            $boardname = $this->getBoardname();

            $smarty = $this->getSmarty();

            if (empty($_SESSION['token'])) {
                $_SESSION['token'] = bin2hex(random_bytes(32));
            }

            //echo $_SESSION['token'];

            $smarty->assign("title", "게시판 글쓰기");
            $smarty->assign("boardname", $boardname);
            $smarty->assign("token", $_SESSION['token']);
            $smarty->display('write.tpl');

        }

        public function write_ok($boardVO, $boardFileArr){

            $id = -1;
            $status = 1;
            $uploadBase = $this->getRootDir() . $this->getUploadDir();
            $result = -1;

            $this->templateDir();
            $this->loadService();
            $boardname = $this->getBoardname();

            $smarty = $this->getSmarty();
            $smarty->clearAllCache();

            //print_r($boardVO);
            
            // 1. 글 제목 판단(길이)
            if ( strlen($boardVO->getSubject()) >= 5 &&
                $status === 1){
                $status = 1;
            }else if ( (strlen($boardVO->getSubject()) >= 0 &&
                        strlen($boardVO->getSubject()) < 5) &&
                      $status === 1){
                $status = 3;
            }

            echo "글 제목 길이:" . $status . "<br>";
            
            // 2. 작성자 입력 여부
            if( strlen( $boardVO->getUsername() ) > 0 
                && $status === 1){
                $status = 1;
            }else if ( strlen( $boardVO->getUsername() ) === 0 &&
                $status === 1){
                $status = 6;
            }

            echo "글 내용 작성여부:" . $status . "<br>";

            // 3. 비밀번호 판단(일치 여부 비교)
            if ( strlen($_POST['passwd1']) != 0 && 
                $_POST['passwd1'] != $_POST['passwd2']) {
                $status = 7;
            }

            echo "비밀번호 일치 여부:" . $status . "<br>";
        
            // 4. 비밀번호 판단(길이)
            if (strlen($_POST['passwd1']) >= 8 &&
                $status === 1){
                $status = 1;                
            }else if( (strlen($_POST['passwd1']) >= 0 &&
                    strlen($_POST['passwd1'] < 8 )) &&
                $status === 1) {
                $status = 8;
            }

            echo "비밀번호 길이2:" . $status . "<br>";
            
            // 5. 비밀번호 입력하기
            if ( $_POST['passwd1'] === $_POST['passwd2'] && 
                 strlen($_POST['passwd1']) != 0 &&
                 $status === 1 ){
                
                $passwd = $_POST['passwd1'];
                $passwd_hash = hash("sha256", $passwd);
                $boardVO->setPasswd($passwd_hash);
                $status = 1;
            }

            echo "비밀번호(암호화):" . $boardVO->getPasswd() . "<br>";

            // 6. 유효 토큰(Token) 판단(CSRF)
            if ( $_POST['token'] === $_SESSION['token'] && 
                 $status === 1 ){
                $status = 1;
            }else if ( $_POST['token'] != $_SESSION['token'] &&
                $status === 1){
                $status = 4;
            }

            echo $_POST['token'] . "/" . $_SESSION['token'] . "<br>";
            echo "토큰:" . $status . "<br>";


            // 7. 게시판 글 등록
            if($status === 1){
                $result = $this->board_service->insertBoard($boardVO);
    
                // 게시글 등록이 성공적인 경우
                if ( $result === 1 ){
                    // header("Location: list");
                    //return 1;
                    $status = 1;
                }
                else{
                    //return 0;
                    $status = 5;
                }

            }

            // 2. 게시판 ID 조회

            switch($status){

                // 성공
                case 1:
                    $result = $this->board_service->selectFullQryView($boardVO);
                    //print_r($result);

                    $id = $result['id'];

                    //print_r($boardFileArr);
                    
                    // 게시물 번호 입력(파일 업로드)
                    foreach($boardFileArr as $key=>$val){
                        $val->setArticle_id($id);
                        //print_r($val);
                        $result = $this->board_service->insertBoardFile($val);
                        //echo $result;

                    }
                    //*/

                    //print_r($boardFileArr);
                    //header("Location: ../list/" . $boardname);

                    // 세션 삭제
                    unset($_SESSION['token']);  // 토큰 삭제
                    
                    $smarty->assign("title", "게시판 글쓰기");
                    $smarty->assign("message", "글쓰기에 성공하였습니다.");
                    $smarty->assign("boardname", $boardname);
                    $smarty->assign("status", $status);
                    $smarty->display('write_ok.tpl');

                    break;
                
                case 2:

                    $smarty->assign("title", "게시판 글쓰기");
                    $smarty->assign("message", "비밀번호 길이를 확인하세요.");
                    $smarty->assign("boardname", $boardname);
                    $smarty->assign("status", $status);
                    $smarty->display('write_ok.tpl');

                    break;

                case 3:

                    $smarty->assign("title", "게시판 글쓰기");
                    $smarty->assign("message", "제목 길이를 확인하세요.");
                    $smarty->assign("boardname", $boardname);
                    $smarty->assign("status", $status);
                    $smarty->display('write_ok.tpl');

                    break;

                case 4:

                    // 세션 삭제
                    unset($_SESSION['token']);  // 토큰 삭제

                    $smarty->assign("title", "게시판 글쓰기");
                    $smarty->assign("message", "비정상적인 접근입니다.");
                    $smarty->assign("boardname", $boardname);
                    $smarty->assign("status", $status);
                    $smarty->display('write_ok.tpl');

                    break;

                case 5:

                    $smarty->assign("title", "게시판 글쓰기");
                    $smarty->assign("message", "글 등록에 실패하였습니다.");
                    $smarty->assign("boardname", $boardname);
                    $smarty->assign("status", $status);
                    $smarty->display('write_ok.tpl');

                    break;

                case 6:

                    $smarty->assign("title", "게시판 글쓰기");
                    $smarty->assign("message", "작성자명을 입력하세요.");
                    $smarty->assign("boardname", $boardname);
                    $smarty->assign("status", $status);
                    $smarty->display('write_ok.tpl');

                    break;

                case 7:

                    $smarty->assign("title", "게시판 글쓰기");
                    $smarty->assign("message", "비밀번호가 일치하지 않습니다.");
                    $smarty->assign("boardname", $boardname);
                    $smarty->assign("status", $status);
                    $smarty->display('write_ok.tpl');

                    break;

                case 8:

                    $smarty->assign("title", "게시판 글쓰기");
                    $smarty->assign("message", "비밀번호 8자리 이상으로 입력하세요.");
                    $smarty->assign("boardname", $boardname);
                    $smarty->assign("status", $status);
                    $smarty->display('write_ok.tpl');

                    break;

            }

        }
        

        public function view($boardVO){

            $this->templateDir();
            $this->loadService();
            $boardname = $this->getBoardname();

            $smarty = $this->getSmarty();
            $smarty->clearAllCache();

            $article_id = $boardVO->getId();
            //echo "야야야야:" . $article_id;
            
            $boardFileVO = new BoardFileVO();
            $boardFileVO->setArticle_id($article_id);

            // DB에서 가져오기
            $boardView = $this->board_service->selectView($boardVO);
            $boardFile = $this->board_service->selectBoardFile($boardFileVO);

            //print_r($boardView);
            //print_r($boardFile);

            $smarty->assign("title", "게시판 보기");
            $smarty->assign("boardname", $boardname);
            $smarty->assign("boardview", $boardView);
            $smarty->assign("boardfile", $boardFile);
            $smarty->display('view.tpl');

        }

        public function deleteView($boardVO){

            $this->templateDir();
            $this->loadService();
            $boardname = $this->getBoardname();

            $smarty = $this->getSmarty();

            $smarty->clearAllCache();

            $smarty->assign("title", "게시판 글 삭제");
            //$smarty->assign("boardview", $boardView);
            $smarty->assign("boardname", $boardname);
            $smarty->assign("articleId", $boardVO->getId());
            $smarty->display('deleteView.tpl');

        }

        public function delete_ok($boardVO){

            $status = -1;

            $this->templateDir();
            $this->loadService();
            $boardname = $this->getBoardname();


            $smarty = $this->getSmarty();
            $smarty->clearAllCache();

            // 파일 정보
            $article_id = $boardVO->getId();
            $boardFileVO = new BoardFileVO();
            $boardFileVO->setArticle_id($article_id);

            $boardView = $this->board_service->selectView($boardVO);
            $boardFile = $this->board_service->selectBoardFile($boardFileVO);

            //echo "비밀번호:" . $result['passwd'] . "<br>";

            // Id 존재여부
            if ($boardVO->getId() === ""){
                
                header("Location: list");
            }

            // 결과가 널이 아닐 때
            if ($boardView != null){
                $status = true;
            }

            // 비밀번호 일치 여부
            if ($boardView['passwd'] === $boardVO->getPasswd()){
                $status = 1;
            }else{
                $status = 2;
            }

            
            if ($status === 1){

                // 파일 삭제
                foreach ($boardFile as $fileitem){
                    echo $fileitem['filename'] . "<br>";
                    $usrFile = $this->getRootDir() . $this->getUploadDir() . "/" . $fileitem['file_name'];
                    
                    if( unlink($usrFile) ) {
                        echo "success\n";
                    }
                    else {
                        echo "failed\n";
                    }

                }

                //echo $result;
                //print_r($result);
                $this->board_service->deleteBoard($boardVO);
                $this->board_service->deleteBoardFile($boardFileVO);
                //echo "참2";
            }

            if ($status === 1){

                $smarty->assign("title", "글 삭제 완료");
                $smarty->assign("boardname", $boardname);
                $smarty->assign("message", "글 삭제가 완료되었습니다.");
                $smarty->assign("status", $status);
                $smarty->display("delete_ok.tpl");

            }
            elseif ($status === 2){
                
                $smarty->assign("title", "글 삭제");
                $smarty->assign("boardname", $boardname);
                $smarty->assign("message", "비밀번호가 일치하지 않습니다.");
                $smarty->assign("status", $status);
                $smarty->assign("articleId", $article_id);
                $smarty->display("delete_ok.tpl");

            }

            else{
                header("Location: ../delete/" . $boardname . "?id=" . $boardVO->getId());
            }
            


        }

        public function modify($boardVO){

            $this->templateDir();
            $this->loadService();
            $boardname = $this->getBoardname();
            $article_id = $boardVO->getId();
            //echo "야야야야:" . $article_id;
            
            $boardFileVO = new BoardFileVO();
            $boardFileVO->setArticle_id($article_id);

            $smarty = $this->getSmarty();
            
            $boardView = $this->board_service->selectView($boardVO);
            $boardFile = $this->board_service->selectBoardFile($boardFileVO);

            $smarty->clearAllCache();

            $smarty->assign("title", "게시판 글 수정");
            $smarty->assign("boardname", $boardname);
            $smarty->assign("boardview", $boardView);
            $smarty->assign("boardfile", $boardFile);
            $smarty->display('modify.tpl');

        }

        public function modify_ok($boardVO){
            
            $status = -1;

            $this->templateDir();
            $this->loadService();
            
            $boardname = $this->getBoardname();

            $smarty = $this->getSmarty();
            $smarty->clearAllCache();

            $boardView = $this->board_service->selectView($boardVO);

            // 비밀번호 일치 판단
            if ($boardView['passwd'] === $boardVO->getPasswd()){
                $status = 1;
            }else{
                $status = 2;
            }

            // 게시글 수정하기
            if ($status === 1){
                echo "참";
                $result = $this->board_service->updateBoard($boardVO);

                if ( $result === 0){
                    $status = 0;
                }

                echo "결과:" . $result . "<br>";

            }

            

            // 결과
            if ($status === 1){

                $location_href = "Location: ../view/" . $boardname . 
                                 "?id=" . $boardVO->getId();

                header($location_href);
            }

            // 오류 페이지 이동
            else if ($status === 2) {

                $smarty->assign("title", "게시판 글 수정");
                $smarty->assign("boardname", $boardname);
                $smarty->assign("articleId", $boardVO->getId());
                $smarty->assign("message", "비밀번호가 일치하지 않습니다.");

                $smarty->display('modify_ok.tpl');

            }

        }

        public function download($boardFileVO){

            $this->templateDir();
            $this->loadService();
            $boardname = $this->getBoardname();

            $smarty = $this->getSmarty();
            $smarty->clearAllCache();

            $fileitem = $this->board_service->selectBoardFileDetail($boardFileVO);

            //print_r($fileitem);
            $this->_download($fileitem);

        }

        private function _download($fileitem){

            $original_name = $fileitem['original_name'];
            $filename = $fileitem['file_name'];
            $target_Dir = $this->getUploadDir();
            $file = $this->getRootDir() . $target_Dir ."/" . $filename;

            $filesize = filesize($file);

            header("Pragma: public");
            header("Expires: 0");
            header("Content-Type: application/octet-stream");
            header("Content-Disposition: attachment; filename=\"$original_name\"");
            header("Content-Transfer-Encoding: binary");
            header("Content-Length: $filesize");

            readfile($file);

        }

    }

?>
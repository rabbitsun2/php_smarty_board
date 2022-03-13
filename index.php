<?php
    /*
        

    */

    $_SETUP_DIR = "/hello2";   // 사용자 설정
    $_UPLOAD_DIR = "/upload";   // 업로드 경로

    $_URL = $_SERVER['PATH_INFO'];
    $_ROOT_DIR = $_SERVER['CONTEXT_DOCUMENT_ROOT'] . $_SETUP_DIR;

    //echo "URL:" . $_URL . "/ROOT_DIR:" . $_ROOT_DIR . "<br>";
    include $_ROOT_DIR . "/include/header.php";

    include $_ROOT_DIR . "/util/UUID.php";
    include $_ROOT_DIR . "/util/Xss.php";
    include $_ROOT_DIR . "/util/Paging.php";

    include $_ROOT_DIR . "/db/MysqlConn.php";

    include $_ROOT_DIR . "/model/PageCriteria.php";
    include $_ROOT_DIR . "/model/BoardVO.php";
    include $_ROOT_DIR . "/model/BoardFileVO.php";

    include $_ROOT_DIR . "/include/DAO.php";
    include $_ROOT_DIR . "/dao/BoardDAO.php";
    include $_ROOT_DIR . "/dao/BoardDAOImpl.php";

    include $_ROOT_DIR . "/include/Service.php";
    include $_ROOT_DIR . "/service/BoardService.php";
    include $_ROOT_DIR . "/service/BoardServiceImpl.php";

    include $_ROOT_DIR . '/framework/smarty/libs/Smarty.class.php';
    include $_ROOT_DIR . "/include/Controller.php";
    include $_ROOT_DIR . "/controller/HomeController.php";
    include $_ROOT_DIR . "/controller/BoardController.php";

    $SUB_LEVEL_SECOND = 2;
    $SUB_LEVEL_THIRD = 3;

    // MariaDB(MySQL) 환경설정
    $mysqlConn = new MysqlConn();
    $mysqlConn->init("localhost", "db01", "123456", "db01");

    $homeController = new HomeController();
    $boardController = new BoardController();
    //echo "참0/게시판" . $_ROOT_DIR . "/";

    $_ROOT_ROUTE = "";
    $_SUB_SECOND_ROUTE = "";
    $_SUB_THIRD_ROUTE = "";

    // Smarty 환경설정
    $smarty = new Smarty();
    //$smarty->force_compile = true;
    //$smarty->debugging = true;
    $smarty->debugging = false;
    $smarty->caching = true;
    $smarty->cache_lifetime = 120;

    // Controller 루트 경로 셋팅
    $homeController->setRootDir($_ROOT_DIR);
    $boardController->setRootDir($_ROOT_DIR);

    // Controller 스마티 셋팅
    $homeController->setSmarty($smarty);
    $boardController->setSmarty($smarty);

    // DB 셋팅
    $homeController->setConn($mysqlConn);
    $boardController->setConn($mysqlConn);

    // 업로드 경로 셋팅
    $homeController->setUploadDir($_UPLOAD_DIR);
    $boardController->setUploadDir($_UPLOAD_DIR);

    // 2. Create a subdivision

    function convSubPath($_URL, $_PATH_STARTNUM, $_PATH_ENDNUM, $_LEVEL){

        //echo "<br>";
        //echo "주소2:" . $_URL . "<br>";

        $_SUB_PATH = "";

        //echo "레벨:" . $_LEVEL . "<br>";

        switch ($_LEVEL){
        
            case 2:

                $_PATH_STARTNUM = strpos($_URL, "/", $_PATH_ENDNUM);
                $_PATH_STARTNUM = $_PATH_STARTNUM + 1;

                //echo "치타:" . $_PATH_ENDNUM + 3 . "<br>";
                //echo "하하:" . strpos($_URL, "/", $_PATH_ENDNUM + 3) . "<br>";

                if(strpos($_URL, "/", $_PATH_ENDNUM + 3) != "" ){
                    $_PATH_ENDNUM = strpos($_URL, "/", $_PATH_STARTNUM);
                    $_PATH_ENDNUM = $_PATH_ENDNUM - $_PATH_STARTNUM;
                }
                else{
                    $_PATH_ENDNUM = strlen($_URL) - 1;
                }

                break;

            case 3:

                $_PATH_STARTNUM = strpos($_URL, "/", $_PATH_ENDNUM);
                $_PATH_STARTNUM = $_PATH_STARTNUM + 1;

                $_SUB_TWO_PATH = convSubPath($_URL, $_PATH_STARTNUM, $_PATH_ENDNUM, 2);
                
                //echo "레벨3 위치 찾기:". strpos($_URL, $_SUB_TWO_PATH, $_PATH_STARTNUM) . "<br>";

                $_PATH_STARTNUM = strpos($_URL, $_SUB_TWO_PATH, $_PATH_STARTNUM);
                $_PATH_STARTNUM = strpos($_URL, "/", $_PATH_STARTNUM);
                $_PATH_STARTNUM = $_PATH_STARTNUM + 1;

                //echo "참참참:" . $_PATH_STARTNUM . "<br>";

                if(strpos($_URL, "/", $_PATH_STARTNUM + 3) != "" ){
                    $_PATH_ENDNUM = strpos($_URL, "/", $_PATH_STARTNUM);
                    $_PATH_ENDNUM = $_PATH_ENDNUM - $_PATH_STARTNUM;
                }
                else{
                    $_PATH_ENDNUM = strlen($_URL) - 1;
                }

                // 상위 루트 레벨일 때 길이 0으로 반환
                if($_PATH_STARTNUM === 1){
                    $_PATH_ENDNUM = 0;
                }

                break;

            default:


        }

        //echo $_PATH_STARTNUM . "*" . $_PATH_ENDNUM . "<br>";
        
        // echo substr($_URL, $_PATH_STARTNUM, $_PATH_ENDNUM);

        $_SUB_PATH = substr($_URL, $_PATH_STARTNUM, $_PATH_ENDNUM);

        return $_SUB_PATH;

    }

    // 3. Identifies string

    // index.php
    if ( strlen($_URL) == 0 ){

        //echo "참1";
        //$a = new HomeController($_ROOT_DIR);
        //$a->home();
        $_ROOT_ROUTE = "home";
    }

    // {pages}.php
    else if ( strlen($_URL) != 0 ){

        //echo "참3";

        $_PATH_STARTNUM = strpos($_URL, "/", 0) + 1;
        //echo $_PATH_STARTNUM;

        $_PATH_ENDNUM = strpos($_URL, "/", 3);

        //echo "처음:" . $_PATH_STARTNUM . "/" . $_PATH_ENDNUM;
        //echo "<br>";

        if (strlen($_PATH_ENDNUM) != 0){
            $_PATH_ENDNUM = $_PATH_ENDNUM - $_PATH_STARTNUM;
        }else{
            $_PATH_ENDNUM = strlen($_URL);
        }

        //echo "나중:" . $_PATH_STARTNUM . "/" . $_PATH_ENDNUM;
        //echo "<br>";

        $_ROOT_ROUTE = substr($_URL, $_PATH_STARTNUM, $_PATH_ENDNUM);
        //echo "주소:" . $_USR_PATH . "<br>";

    }

    // SubPage(Route)
    if ( $_ROOT_ROUTE != "home" ){
        //echo convSubPath($_URL, $_PATH_STARTNUM, $_PATH_ENDNUM);
        $_SUB_SECOND_ROUTE = convSubPath($_URL, $_PATH_STARTNUM, $_PATH_ENDNUM, $SUB_LEVEL_SECOND);
        $_SUB_THIRD_ROUTE = convSubPath($_URL, $_PATH_STARTNUM, $_PATH_ENDNUM, $SUB_LEVEL_THIRD);
    }

    //echo "레벨2 결과:". $_SUB_TWO_PATH . "<br>";
    //echo "레벨3 결과:". $_SUB_THIRD_PATH . "<br>";

    // Controller 라우트 설정
    $homeController->setRootRoute($_ROOT_ROUTE);
    $homeController->setSecondRoute($_SUB_SECOND_ROUTE);
    $homeController->setThirdRoute($_SUB_THIRD_ROUTE);

    $boardController->setRootRoute($_ROOT_ROUTE);
    $boardController->setSecondRoute($_SUB_SECOND_ROUTE);
    $boardController->setThirdRoute($_SUB_THIRD_ROUTE);

    // Route Controller
    switch($_ROOT_ROUTE){

        case "home":
            $homeController->home();
            break;

        case "board":
            
            switch($_SUB_SECOND_ROUTE){

                case "list":
                    //echo "참4/목록";
                    $pageCri = new PageCriteria();

                    // 페이지 설정
                    if ($_GET['page'] >= 0 && 
                        is_numeric($_GET['page'])){

                        $pageCri->setPage($_GET['page']);
                    }

                    $boardController->list($pageCri);
                    break;

                case "view":
                    $boardVO = new BoardVO();
                    $boardVO->setId($_GET['id']);

                    //echo $boardVO->getId();

                    $boardController->view($boardVO);

                    break;

                case "write":
                    $boardController->write();
                    break;

                case "write_ok":

                    $status = false;

                    $dt = new DateTime('NOW');
                    $dt = $dt->format('Y-m-d H:i:s');
                    $boardFileArr = array();
                    //echo "현재 날짜:" . $dt . "<br>";

                    $ipAddr = $_SERVER["REMOTE_ADDR"];

                    $boardVO = new BoardVO();

                    //echo $_POST['subject'];
                    $boardVO->setSubject($_POST['subject']);
                    //echo $boardVO->getSubject();
                    $boardVO->setMemo(Xss::xss_clean( $_POST['memo'] ));
                    //echo $_POST['username'];
                    $boardVO->setUsername($_POST['username']);
                    //echo $boardVO->getUsername();


                    $boardVO->setIp($ipAddr);
                    $boardVO->setCnt(0);
                    $boardVO->setRegidate($dt);
                    
                    // 파일 업로드
                    foreach($_FILES['usrupload']['name'] as $f => $name){

                        $boardFileVO = new BoardFileVO();

                        $name = $_FILES['usrupload']['name'][$f];
                        $uploadName = explode('.', $name);

                        $fileName = time(). $f . "." . $uploadName[1];
                        $uploadRealName = $_ROOT_DIR . $_UPLOAD_DIR . "/" . $fileName;
                        $originalName = $_FILES['usrupload']['name'][$f];
                        $fileSize = $_FILES['usrupload']['size'][$f];
                        $fileExt = $uploadName[1];
                        $fileType = $_FILES['usrupload']['type'][$f];
                        
                        //echo $fileName . ",";
                        //echo $originalName. "," . $fileSize . "," . $fileExt . "," . $fileType . "<br>";

                        // 파일 정보 입력
                        $boardFileVO->setFile_name($fileName);
                        $boardFileVO->setOriginal_name($originalName);
                        $boardFileVO->setFile_size($fileSize);
                        $boardFileVO->setFile_ext($fileExt);
                        $boardFileVO->setFile_type($fileType);
                        $boardFileVO->setRegidate($dt);

                        //echo $uploadName;

                        // 파일 서버 전송
                        if ( strlen($originalName) != 0 ){

                            if (move_uploaded_file($_FILES['usrupload']['tmp_name'][$f], $uploadRealName)){
                                echo "success";
                            }else{
                                echo "error";
                            }

                        }

                        // 파일정보 배열로 입력
                        if(strlen($originalName) != 0){
                            array_push($boardFileArr, $boardFileVO);
                        }
                    
                    }
                    
                    $boardController->write_ok($boardVO, $boardFileArr);

                    break;

                case "modify":
                    $boardVO = new BoardVO();
                    $boardVO->setId($_GET['id']);

                    $boardController->modify($boardVO);

                    break;

                case "modify_ok":
                    $boardVO = new BoardVO();
                    $boardVO->setId($_POST["articleId"]);
                    $boardVO->setSubject($_POST["subject"]);
                    $boardVO->setUsername($_POST["username"]);

                    $passwd = $_POST['passwd'];
                    $passwd_hash = hash("sha256", $passwd);

                    $boardVO->setPasswd( $passwd_hash );
                    $boardVO->setMemo( Xss::xss_clean( $_POST['memo'] ) );

                    $boardController->modify_ok($boardVO);

                    break;


                case "delete":
                    $boardVO = new BoardVO();
                    $boardVO->setId($_GET['id']);

                    $boardController->deleteView($boardVO);

                    break;

                case "delete_ok":
                    $boardVO = new BoardVO();
                    $boardVO->setId($_POST['articleId']);

                    $passwd = $_POST['passwd'];
                    $passwd_hash = hash("sha256", $passwd);
                    $boardVO->setPasswd($passwd_hash);
                    
                    //echo "참";
                    $boardController->delete_ok($boardVO);

                    break;

                case "download":
                    $boardFileVO = new BoardFileVO();
                    $boardFileVO->setId($_GET['file_id']);

                    $boardController->download($boardFileVO);

                    break;

                default:

            }

            break;

        default:

    }

    // Free memory
    if ($smarty != null){
        unset($smarty);
    }

    if($homeController != null){
        unset($homeController);
    }

    if($boardController != null){
        unset($boardController);
    }

?>
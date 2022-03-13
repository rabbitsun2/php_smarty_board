<?php

    class HomeController extends Controller {

        public function __construct(){
            
        }

        public function __destruct(){

        }

        private function templateDir(){
            $smarty = $this->getSmarty();
            $root_dir = $this->getRootDir();
            $smarty->template_dir = $root_dir . '/view';

            $this->setSmarty($smarty);

        }
        
        public function home(){
            //echo "홈2 / 참";
            //require_once $this->root_dir . "view/home.php";
            
            $smarty = $this->getSmarty();

            $this->templateDir();
            $smarty->assign("option_selected", "NE");
            $smarty->display('index.tpl');

        }

    }

?>
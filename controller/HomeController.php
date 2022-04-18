<?php

    class HomeController extends Controller {

        public function __construct(){
            
        }

        public function __destruct(){

        }

        private function templateDir(){
            $smarty = $this->getSmarty();
            $root_dir = $this->getRootDir();
            $smarty->setTemplateDir($root_dir . '/view');

            $this->setSmarty($smarty);

        }
        
        public function home(){
            //echo "홈2 / 참";
            //require_once $this->root_dir . "view/home.php";
            
            $this->templateDir();
            $smarty = $this->getSmarty();
            $smarty->clearAllCache();

            $smarty->assign("option_selected", "NE");
            $smarty->display('index.tpl');

        }

    }

?>

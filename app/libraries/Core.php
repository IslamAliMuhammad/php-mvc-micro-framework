<?php
    /* 
     * App Core Class
     * Creates URL & load core controller
     * URL FORMAT - /controller/method/params
     */
    class Core {
        protected $currentController = 'Pages';
        protected $currentMethod = 'index';
        protected $params = [];

        public function __construct(){
            // print_r($this->getUrl());
        
            $url = $this->getUrl();
            if(isset($url)){
                if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')){
                    $this->currentController = ucwords($url[0]);
                    unset($url[0]);
                }
            }

            // echo $this->currentController;
            require_once '../app/controllers/' . $this->currentController . '.php';

            $this->currentController = new $this->currentController();
        }

        public function getUrl(){
            if(isset($_GET['url'])){
                $url = rtrim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);
                return $url;
            }
        }
    }
?>
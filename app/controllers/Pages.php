<?php
    class Pages {
        public function __construct(){
            
        }

        public function index(){
            echo 'hello I am  index function';
        }

        public function about($id){
            echo $id;
        }
    }
?>
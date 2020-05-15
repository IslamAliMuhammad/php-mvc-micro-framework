<?php
    /**
     * PDO Database Class
     * Connect to database 
     */

    class Database {
        private $hostName = DB_HOST;
        private $userName = DB_USER;
        private $userPassword = DB_PASS;
        private $dbName = DB_NAME;

        private $conn;
        private $stmt;
        private $error;

        public function __construct(){
            $dsn = 'mysql:host=' . $this->hostName . ';dbname=' . $this->dbName;
            $options = [
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ];

            try {

                $this->conn = new PDO($dsn, $this->userName, $this->userPassword, $options); 

            } catch(PDOException $e){
                $this->error = $e->getMessage();
                echo $this->error;
            }
        }

    }
?>
<?php

    class DbConnect {
        private $host = "localhost";
        private $user = "root";
        private $pass = "";
        private $dbname = "result_management";

        public function connect() {
            try {
                $conn = new PDO('mysql:host=' .$this->host . '; dbname=' .$this->dbname, $this->user, $this->pass);
                $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                return $conn;
            }catch( PDOException $e) {
                echo 'Database Error' .$e->getMessage();
            }
        }

    }


?>
<?php
    class Connection {
        private $server;
        private $db;
        private $user;
        private $pass;
        private $conn;

        public function __construct($s, $d, $u, $p){
            $this->server = $s;
            $this->db = $d;
            $this->user = $u;
            $this->pass = $p;
            try {
                $this->conn = new PDO("mysql:host=".$this->server.";dbname=".$this->db."", $this->user, $this->pass);
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        public function getConnection(){
            return $this->conn;
        }

    }

?>
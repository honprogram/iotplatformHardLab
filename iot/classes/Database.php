<?php 
    class Database {
        private $host = "localhost";
        private $database = "hivaindb_alldata";
        private $username = "root";
        private $password = "";
        public $conn;
    public function __construct(){
        try {
            $this->conn = new mysqli ($this->host, $this->username, $this->password,$this->database);
        } catch (mysqli_sql_exception $exception) {
            echo "Database could not be connected: " . $exception->getMessage();
        }
    }
    }  
?>
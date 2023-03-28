<?php 
    class Database {
        private $host = "localhost:3306";
        private $database = "hivaindb_alldata";
        private $username = "hivaindb_test";
        private $password = "KC39FTpLIu.0J7_9bt";
        public $conn;
    
    public function __construct(){
        try {
            $this->conn = new mysqli ($this->host, $this->username, $this->password,$this->database);
        } catch (mysqli_sql_exception $exception) {
            echo "Database could not be connected: " . $exception->getMessage();
        }
    }
    public function connect(){
        try {
            $this->connID = new mysqli ($this->host, $this->username, $this->password,"hivaindb_MainDB");
        } catch (mysqli_sql_exception $exception) {
            echo "Database could not be connected: " . $exception->getMessage();
        }
    }
    
    }
?>
<?php 
    class Database {
        private $host = "localhost";
        private $database = "hivaindb_alldata";
        private $username = "hivaindb_gainer";
        private $password = "6)Nwk3w.pI[u";
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
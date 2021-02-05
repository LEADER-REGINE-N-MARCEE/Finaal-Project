<?php
class Database{
  
    // database credentials
    private $host = "localhost"; #localhost
    private $db_name = "store"; #name ng database
    private $username = "root"; #username
    private $password = "";#wala
    public $conn; #variable ng connection
  
    // para maka connect sa database
    public function getConnection(){
  
        $this->conn = null;
  
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
  
        return $this->conn;
    }
}
?>
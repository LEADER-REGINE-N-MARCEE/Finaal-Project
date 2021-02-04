<?php
 
class User{
    private $conn;

    public $id;
    public $firstname;
    public $lastname;
    public $email;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function emailCheck($email){  
        $qr = "SELECT * FROM users WHERE email = '".$email."'";  
        $query2 = $this->conn->prepare($qr);
        $query2->execute();

        if($query2->rowCount() > 0){
            return true;
        }
        else{
            return false;
        }
    }  
    
    public function escape_string($value){
        
        return $this->connection->real_escape_string($value);
    }
}

?>
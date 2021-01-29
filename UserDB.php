<?php
include_once('config.php');
 
class User extends DbConnection{

    public function __construct(){

        parent::__construct();
    }

    public function insert($fname, $lname, $email, $password){

            
        $sql = "INSERT INTO users (firstname, lastname, email, pass) VALUES('$fname', '$lname', '$email', '$password')";
        $query = $this->connection->query($sql);
        return $query;
        
    }
    
    public function insertInfo($infoID, $fullname, $flrnum, $province, $municipality, $barangay, $mobilenum){

            
        $sql = "INSERT INTO user_info (infoID, fullname, flrnum, province, municipality, barangay, mobilenum) VALUES('$infoID', '$fullname', '$flrnum', '$province', '$municipality', '$barangay', '$mobilenum')";
        $query = $this->connection->query($sql);
        return $query;
        
    }

    public function emailCheck($email){  
        $qr = "SELECT * FROM users WHERE email = '".$email."'";  
        $query2 = $this->connection->query($qr);

        if($query2->num_rows > 0){
            return true;
        }
        else{
            return false;
        }
    }  
    
    public function check_login($email, $password){

        
        $sql = "SELECT * FROM users WHERE email = '$email' AND pass = '$password'";
        $query = $this->connection->query($sql);

        if($query->num_rows > 0){
            $row = $query->fetch_array();
            return $row['id'];
        }
        else{
            return false;
        }
    }
        
    public function details($sql){

        $query = $this->connection->query($sql);
        
        $row = $query->fetch_array();
            
        return $row;       
    }
    
    public function escape_string($value){
        
        return $this->connection->real_escape_string($value);
    }
}

?>
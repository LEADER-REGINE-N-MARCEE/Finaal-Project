<?php
    include_once('config.php');

    Class signup extends DbConnection {
        public function __construct(){

            parent::__construct();
            
        }

        public function insert($fname, $lname, $email, $password){

            
            $sql = "INSERT INTO users (firstname, lastname, email, pass) VALUES('$fname', '$lname', '$email', '$password')";
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

        public function escape_string($value){
        
            return $this->connection->real_escape_string($value);
        }

    }
?>
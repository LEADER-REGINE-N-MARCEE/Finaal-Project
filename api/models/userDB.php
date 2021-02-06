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


    #check kung existing na ung email
    public function emailCheck($email){  
        $qr = "SELECT * FROM users WHERE email = '".$email."'";  
        $query2 = $this->conn->prepare($qr);
        $query2->execute();

        if($query2->rowCount() > 0){ #pag more than 0 ung niretrun na rows, ibig sabihin existing na ung email
            return true; #return true, para sa if else natin sa API
        }
        else{
            return false; #return false, para sa if else natin sa API
        }
    }

    public function addtocart($usrID, $itemCode, $itemType, $itemName, $quantity){

        $sql = "INSERT INTO orders (orderID, itemCode, itemType, itemName, amount) VALUES('$usrID', '$itemCode', '$itemType', '$itemName', '$quantity')";
        $query = $this->conn->prepare($sql);
        $query->execute();

        return $query;
    }
    
    public function escape_string($value){
        
        return $this->connection->real_escape_string($value); #ewan ko kung bakit may ganito baka di need pero nilagay ko parin
    }
}

?>
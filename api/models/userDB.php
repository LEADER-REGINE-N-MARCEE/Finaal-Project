<?php
 
class User{
    private $conn;

    public $id;
    public $firstname;
    public $lastname;
    public $email;
    public $orderID;
    public $invoiceNum;
    public $totalprice;
    public $totalquantity;
    public $order_status;

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

    public function user_info($usrID){
        $sql = "SELECT * FROM user_info WHERE infoID = '$usrID'";
        $query = $this->conn->prepare($sql);
        $query->execute();
        
        return $query;
    }

    public function addInfo($infoID, $fullname, $flrnum, $province, $municipality, $barangay, $mobilenum){

            
        $sql = "INSERT INTO user_info (infoID, fullname, flrnum, province, municipality, barangay, mobilenum) VALUES('$infoID', '$fullname', '$flrnum', '$province', '$municipality', '$barangay', '$mobilenum')";
        $query = $this->conn->prepare($sql);
        $query->execute();
        return $query;
        
    }

    public function checkout(){
        $query = "INSERT INTO invoice SET orderID=:orderID, invoiceNum=:invoiceNum, totalprice=:totalprice, totalquantity=:totalquantity, order_status=:order_status";
        $stmt = $this
            ->conn
            ->prepare($query);

        $this->orderID = htmlspecialchars(strip_tags($this->orderID));
        $this->invoiceNum = htmlspecialchars(strip_tags($this->invoiceNum));
        $this->totalprice = htmlspecialchars(strip_tags($this->totalprice));
        $this->totalquantity = htmlspecialchars(strip_tags($this->totalquantity));
        $this->order_status = "PENDING";


        $stmt->bindParam(":orderID", $this->orderID);
        $stmt->bindParam(":invoiceNum", $this->invoiceNum);
        $stmt->bindParam(":totalprice", $this->totalprice);
        $stmt->bindParam(":totalquantity", $this->totalquantity);
        $stmt->bindParam(":order_status", $this->order_status);

        if ($stmt->execute())
        {
            return true;
        }

        return false;
    }
    
    public function escape_string($value){
        
        return $this->connection->real_escape_string($value); #ewan ko kung bakit may ganito baka di need pero nilagay ko parin
    }
}

?>
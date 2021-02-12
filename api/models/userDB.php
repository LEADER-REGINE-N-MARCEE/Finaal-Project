<?php
class User {
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

    public function __construct($db) {
        $this->conn = $db;
    }

    #check kung existing na ung email
    public function emailCheck($email) {
        $qr = "SELECT * FROM users WHERE email = '" . $email . "'";
        $query2 = $this
            ->conn
            ->prepare($qr);
        $query2->execute();

        if ($query2->rowCount() > 0) { #pag more than 0 ung niretrun na rows, ibig sabihin existing na ung email
            return true; #return true, para sa if else natin sa API 
        } else {
            return false; #return false, para sa if else natin sa API 
        }
    }

    public function addtocart($usrID, $itemCode, $itemType, $itemName, $quantity) {
        $sql = "INSERT INTO orders (orderID, itemCode, itemType, itemName, amount) VALUES('$usrID', '$itemCode', '$itemType', '$itemName', '$quantity')";
        $query = $this
            ->conn
            ->prepare($sql);
        $query->execute();

        return $query;
    }

    public function user_info($usrID) {
        $sql = "SELECT * FROM user_info WHERE infoID = '$usrID'";
        $query = $this
            ->conn
            ->prepare($sql);
        $query->execute();

        return $query;
    }

    public function addInfo() {
        $sql = "INSERT INTO user_info SET infoID=:infoID, fullname=:fullname, flrnum=:flrnum, province=:province, municipality=:municipality, barangay=:barangay, mobilenum=:mobilenum";
        $stmt = $this
            ->conn
            ->prepare($sql);

        $this->infoID = htmlspecialchars(strip_tags($this->infoID));
        $this->fullname = htmlspecialchars(strip_tags($this->fullname));
        $this->flrnum = htmlspecialchars(strip_tags($this->flrnum));
        $this->province = htmlspecialchars(strip_tags($this->province));
        $this->municipality = htmlspecialchars(strip_tags($this->municipality));
        $this->barangay = htmlspecialchars(strip_tags($this->barangay));
        $this->mobilenum = htmlspecialchars(strip_tags($this->mobilenum));

        $stmt->bindParam(":infoID", $this->infoID);
        $stmt->bindParam(":fullname", $this->fullname);
        $stmt->bindParam(":flrnum", $this->flrnum);
        $stmt->bindParam(":province", $this->province);
        $stmt->bindParam(":municipality", $this->municipality);
        $stmt->bindParam(":barangay", $this->barangay);
        $stmt->bindParam(":mobilenum", $this->mobilenum);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function checkout() {
        $query = "INSERT INTO invoice SET orderID=:orderID, invoiceNum=:invoiceNum, totalprice=:totalprice, order_status=:order_status";
        $stmt = $this
            ->conn
            ->prepare($query);

        $this->orderID = htmlspecialchars(strip_tags($this->orderID));
        $this->invoiceNum = htmlspecialchars(strip_tags($this->invoiceNum));
        $this->totalprice = htmlspecialchars(strip_tags($this->totalprice));
        $this->order_status = "PENDING";

        $stmt->bindParam(":orderID", $this->orderID);
        $stmt->bindParam(":invoiceNum", $this->invoiceNum);
        $stmt->bindParam(":totalprice", $this->totalprice);
        $stmt->bindParam(":order_status", $this->order_status);

        if ($stmt->execute()) {
            $query2 = "UPDATE orders SET invoiceNum = :invoiceNum WHERE invoiceNum IS NULL AND orderID = :orderID";
            $stmt2 = $this
                ->conn
                ->prepare($query2);
            $this->invoiceNum = htmlspecialchars(strip_tags($this->invoiceNum));
            $this->orderID = htmlspecialchars(strip_tags($this->orderID));
            $stmt2->bindParam(":orderID", $this->orderID);
            $stmt2->bindParam(":invoiceNum", $this->invoiceNum);
            if ($stmt2->execute()) {
                
                    return true;
            }
        }
        return false;
    }

    function updateInvoice($orderID, $invoiceNum) {
        $query = "UPDATE orders SET invoiceNum = '$invoiceNum' WHERE orderID = '$orderID'";
        $query = $this
            ->conn
            ->prepare($query);
        $query->execute();
    }

    function getInvoice($usrID) {
        $sql = "SELECT * FROM invoice WHERE orderID = '$usrID'";
        $query = $this
            ->conn
            ->prepare($sql);
        $query->execute();
        return $query;
    }

    public function cancelOrder() {
        $query = "UPDATE invoice SET order_status=:order_status WHERE invoiceNum=:invoiceNum";
        $stmt = $this
            ->conn
            ->prepare($query);

        $this->order_status = htmlspecialchars(strip_tags($this->order_status));
        $this->invoiceNum = htmlspecialchars(strip_tags($this->invoiceNum));

        $stmt->bindParam(":invoiceNum", $this->invoiceNum);
        $stmt->bindParam(":order_status", $this->order_status);

        if ($stmt->execute()) {
            return true;

        }
        return false;
    }

    public function escape_string($value) {
        return $this
            ->connection
            ->real_escape_string($value); #ewan ko kung bakit may ganito baka di need pero nilagay ko parin
    }
}
?>
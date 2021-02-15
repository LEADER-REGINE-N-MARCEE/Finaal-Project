<?php
class Product {

    private $conn;
    private $table_name = "items";

    public $itemID;
    public $itemCode;
    public $itemType;
    public $itemName;
    public $subtitle;
    public $quantity;
    public $descriptions;
    public $price;
    public $img_path;

    public function __construct($db) {
        $this->conn = $db;
    }

    function items() {
        $query = "SELECT * FROM `items`";
        $stmt = $this
            ->conn
            ->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function neworders() {
        $query = "SELECT * FROM `invoice` WHERE `order_status`='PENDING'";
        $stmt = $this
            ->conn
            ->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function viewOrders() {
        $query = "SELECT * FROM `invoice`";
        $stmt = $this
            ->conn
            ->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function activeDiscounts() {
        $query = "SELECT * FROM `discounts` WHERE `discount_status`='ACTIVE'";
        $stmt = $this
            ->conn
            ->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function create() {
        $query = "INSERT INTO " . $this->table_name . " SET itemID=:itemID, itemCode=:itemCode, itemType=:itemType, itemName=:itemName, subtitle=:subtitle, quantity=:quantity, descriptions=:descriptions, price=:price, img_path=:img_path";
        $stmt = $this
            ->conn
            ->prepare($query);

        $this->itemID = htmlspecialchars(strip_tags($this->itemID));
        $this->itemCode = htmlspecialchars(strip_tags($this->itemCode));
        $this->itemType = htmlspecialchars(strip_tags($this->itemType));
        $this->itemName = htmlspecialchars(strip_tags($this->itemName));
        $this->subtitle = htmlspecialchars(strip_tags($this->subtitle));
        $this->quantity = htmlspecialchars(strip_tags($this->quantity));
        $this->descriptions = htmlspecialchars(strip_tags($this->descriptions));
        $this->price = htmlspecialchars(strip_tags($this->price));
        $this->img_path = htmlspecialchars(strip_tags($this->img_path));

        $stmt->bindParam(":itemID", $this->itemID);
        $stmt->bindParam(":itemCode", $this->itemCode);
        $stmt->bindParam(":itemType", $this->itemType);
        $stmt->bindParam(":itemName", $this->itemName);
        $stmt->bindParam(":subtitle", $this->subtitle);
        $stmt->bindParam(":quantity", $this->quantity);
        $stmt->bindParam(":descriptions", $this->descriptions);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":img_path", $this->img_path);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}

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

    public function viewUsers() {
        $qr = "SELECT * FROM users WHERE roles <> 'admin'";
        $query2 = $this
            ->conn
            ->prepare($qr);
        $query2->execute();

        return $query2;
    }

    public function adminInfo() {
        $qr = "SELECT * FROM users WHERE roles = 'admin'";
        $query2 = $this
            ->conn
            ->prepare($qr);
        $query2->execute();

        return $query2;
    }

    public function updateOrder() {
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

    function updateInvoice($orderID, $invoiceNum) {
        $query = "UPDATE orders SET invoiceNum = '$invoiceNum' WHERE orderID = '$orderID'";
        $query = $this
            ->conn
            ->prepare($query);
        $query->execute();
    }

    public function escape_string($value) {
        return $this
            ->connection
            ->real_escape_string($value); #ewan ko kung bakit may ganito baka di need pero nilagay ko parin
    }
}
?>

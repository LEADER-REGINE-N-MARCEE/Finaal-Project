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

    function discount($discountCode){
        $query = "SELECT * FROM `discounts` WHERE `discountCode` = '" . $discountCode . "' AND `discount_status` = 'ACTIVE'";
        $stmt = $this
            ->conn
            ->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function read($itemType) {
        $query = "SELECT itemID, itemCode, itemType, itemName, subtitle, quantity , descriptions, price, img_path FROM " . $this->table_name . " WHERE itemType = '" . $itemType . "'";
        $stmt = $this
            ->conn
            ->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function indexRead($itemType) {
        $query = "SELECT itemID, itemCode, itemType, itemName, subtitle, quantity , descriptions, price, img_path FROM " . $this->table_name . " WHERE itemType = '" . $itemType . "' LIMIT 3";
        $stmt = $this
            ->conn
            ->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function cart($usrID) {
        $query = "SELECT * FROM items i JOIN orders o ON i.`itemCode` = o.`itemCode` WHERE o.`invoiceNum` IS NULL AND o.`orderID`='" . $usrID . "'";
        $stmt = $this
            ->conn
            ->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function prod($itemCode) {
        $query = "SELECT itemID, itemCode, itemType, itemName, subtitle, quantity , descriptions, price, img_path, img_path2, img_path3 FROM " . $this->table_name . " WHERE itemCode = '" . $itemCode . "'";
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




?>

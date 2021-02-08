<?php
class Invoice
{

    private $conn;
    private $table_name = "invoice";

    public $orderID;
    public $invoiceNum;
    public $totalprice;
    public $order_status;
    public $order_date;

    public function __construct($db) {
        $this->conn = $db;
    }

    function read($orderID) {
        $query = "SELECT invoiceNum, order_status FROM " . $this->table_name . " WHERE orderID = '" . $orderID . "'";
        $stmt = $this
            ->conn
            ->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function addInfo($orderID) {
        $query = "INSERT INTO " . $this->table_name . " SET orderID=:orderID, invoiceNum=:invoiceNum, totalprice=:totalprice, order_status=:order_status";
        $stmt = $this
            ->conn
            ->prepare($query);

        $this->orderID = htmlspecialchars(strip_tags($this->orderID));
        $this->invoiceNum = htmlspecialchars(strip_tags($this->invoiceNum));
        $this->totalprice = htmlspecialchars(strip_tags($this->totalprice));
        $this->order_status = htmlspecialchars(strip_tags($this->order_status));

        $stmt->bindParam(":itemID", $this->orderID);
        $stmt->bindParam(":itemCode", $this->invoiceNum);
        $stmt->bindParam(":itemType", $this->totalprice);
        $stmt->bindParam(":itemName", $this->order_status);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
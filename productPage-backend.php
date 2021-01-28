<?php
include_once('config.php');

class productsView extends DbConnection
{
    
    public function __construct()
    {
        
        parent::__construct();
    }
    
    public function productDetails($itemName)
    {
        
        
        $sql   = "SELECT itemCode, itemName, itemType, subtitle, quantity, descriptions FROM items WHERE itemName = '$itemName'";
        $query = $this->connection->query($sql);
        
        
        while ($row = mysqli_fetch_assoc($query)) {
            $itemCode    = $row['itemCode'];
            $itemName    = $row['itemName'];
            $itemType    = $row['itemType'];
            $subtitle    = $row['subtitle'];
            $quantity    = $row['quantity'];
            $description = $row['descriptions'];
            echo "<h2 class= \'Item Name\'>" . $itemName . "</h2>\n";
            echo "<h6 class= \'Subtitle\'> " . $subtitle . "</h6>\n";
            echo "<p class= \'Descriptions\'> " . $description . "</p>\n";
            echo "<p class= \'Quantity\'>Stocks: " . $quantity . "</p>\n";
            echo "<form method='POST' action='buynow.php'>";
            echo"<input type='text' placeholder='Quantity' name='quantity'>";
            echo "<button type='submit' name='buynow' class= \'Buy Now\'>Add to Cart</a>\n";
            echo "</form>";
            return array ($itemCode, $itemName, $itemType);
        }
        
    }

    public function buy($itemCode, $usrID, $itemType, $itemName, $quantity){

        $sql = "INSERT INTO orders (orderID, itemCode, itemType, itemName, quantity) VALUES('$usrID', '$itemCode', '$itemType', '$itemName', '$quantity')";
        $query = $this->connection->query($sql);
    }
    
    public function escape_string($value)
    {
        
        return $this->connection->real_escape_string($value);
    }
    
}

?>
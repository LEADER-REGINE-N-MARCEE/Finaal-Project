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
        
        
        $sql   = "SELECT itemCode, itemName, subtitle, quantity, descriptions FROM items WHERE itemName = '$itemName'";
        $query = $this->connection->query($sql);
        
        
        while ($row = mysqli_fetch_assoc($query)) {
            $itemName    = $row['itemName'];
            $subtitle    = $row['subtitle'];
            $quantity    = $row['quantity'];
            $description = $row['descriptions'];
            echo "<h2 class= \'Item Name\'>" . $itemName . "</h2>\n";
            echo "<h6 class= \'Subtitle\'> " . $subtitle . "</h6>\n";
            echo "<p class= \'Descriptions\'> " . $description . "</p>\n";
            echo "<p class= \'Quantity\'>Quantity: " . $quantity . "</p>\n";
            echo "<a href='buynow' class= \'Buy Now\'>Buy Now</a>\n";
        }
        
    }
    
    public function escape_string($value)
    {
        
        return $this->connection->real_escape_string($value);
    }
    
}

?>
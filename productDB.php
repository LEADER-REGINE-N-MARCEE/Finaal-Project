<?php
include_once('config.php');

class products extends DbConnection
{
    
    public function __construct()
    {
        
        parent::__construct();
    }
    
    public function crawlDB($table)
    {
        
        
        $sql   = "SELECT itemName, subtitle FROM items WHERE itemType = '$table'";
        $query = $this->connection->query($sql);
        
        echo "<thead>
            <tr>
            <th>Item Name</th>
            <th>Subtitle</th>
            </tr>
            </thead>
            <tbody>";
        
        while ($row = mysqli_fetch_assoc($query)) {
            $itemName = $row['itemName'];
            $subtitle = $row['subtitle'];
            echo "<br>";
            echo "<td class= \'Item Name\'><a href='productPage.php?itemName=$itemName'>" . $itemName . " <a></td>\n";
            echo "<td class= \'Subtitle\'> " . $subtitle . "</td>\n";
            echo "</tbody>";
        }
        
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
            echo "<form method='POST' action='addtocart.php'>";
            echo"<input type='text' placeholder='Quantity' name='quantity'>";
            echo "<button type='submit' name='addtocart' class= \'Add to Cart\'>Add to Cart</a>\n";
            echo "</form>";
            return array ($itemCode, $itemName, $itemType);
        }
        
    }

    public function buy($itemCode, $usrID, $itemType, $itemName, $quantity, $invoiceNum){

        $sql = "INSERT INTO orders (orderID, itemCode, itemType, itemName, quantity, invoiceNum) VALUES('$usrID', '$itemCode', '$itemType', '$itemName', '$quantity', '$invoiceNum')";
        $query = $this->connection->query($sql);
    }

    public function checkout ($orderID ,$invoicenum, $totalprice, $totalquantity){
        $sql = "INSERT INTO invoice (orderID, invoiceNum, totalprice, totalquantity) VALUES('$orderID' ,'$invoicenum', '$totalprice', '$totalquantity')";
        $query = $this->connection->query($sql);
        $sql = "DELETE from orders WHERE invoiceNum = '$invoicenum'";
        $query = $this->connection->query($sql);
    }

    public function escape_string($value)
    {
        
        return $this->connection->real_escape_string($value);
    }
    
}

?>
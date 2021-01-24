<?php 
    include_once('config.php');

    class products extends DbConnection{
        
        public function __construct(){

            parent::__construct();
        }

        public function crawlDB($table){

        
            $sql = "SELECT itemName, subtitle FROM items WHERE itemType = '$table'";
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
                echo "<td class= \'LIS\'> " . $itemName . "</td>\n";
                echo "<td class= \'Last Name\'> " . $subtitle . "</td>\n";
                echo "</tbody>";
            }

        }

        public function escape_string($value){
        
            return $this->connection->real_escape_string($value);
        }

    }

?>
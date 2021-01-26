<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE store character set UTF8mb4 collate utf8mb4_bin";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
    $dbname = "store";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // sql to create table
    $sql = "CREATE TABLE users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        email VARCHAR(50), 
        pass VARCHAR(255),
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if ($conn->query($sql) === TRUE) {
        $conn = new mysqli($servername, $username, $password, $dbname);
        echo "Table users created successfully";
        $sql = "CREATE TABLE user_info (
            infoID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            fullname VARCHAR (255),
            flrnum INT (10),
            province VARCHAR (255),
            municipality VARCHAR (255),
            barangay VARCHAR (255),
            mobilenum VARCHAR (15),
            FOREIGN KEY (infoID) REFERENCES users(id)
            )";
            if ($conn->query($sql) === TRUE) {
                
                echo "Table user_info created successfully";

                $conn = new mysqli($servername, $username, $password, $dbname);
                $sql  = "CREATE TABLE items (
                itemID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                itemCode VARCHAR (255),
                itemType VARCHAR (50),
                itemName VARCHAR (255),
                subtitle TEXT,
                quantity VARCHAR (255),
                descriptions TEXT
                )";
                if ($conn->query($sql) === TRUE) {
                    echo "Table items created successfully";
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    $sql  = "CREATE TABLE orders (
                    orderID INT(6) UNSIGNED,
                    itemCode VARCHAR (255),
                    itemType VARCHAR (50),
                    itemName VARCHAR (255),
                    quantity VARCHAR (255)
                    )";

                    if ($conn->query($sql) === TRUE) {
                        echo "Table orders created successfully";
                    } else {
                        echo "Error creating table: " . $conn->error;
                    }
                }else {
                    echo "Error creating table: " . $conn->error;
                }   

            } else {
                echo "Error creating table: " . $conn->error;
            }    
    } else 
        echo "Error creating table: " . $conn->error; 
    } else 
    echo "Error creating database: " . $conn->error;

$conn->close();
?>
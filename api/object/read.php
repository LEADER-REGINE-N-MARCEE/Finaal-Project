<?php

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=utf-8");
    if ($_SERVER["REQUEST_METHOD"] !== "GET") {
        http_response_code(404);
        echo "HTTP Request method invalid!";
        return;
    }

    include_once '../config/database.php';
    include_once '../models/product.php';

    $database = new Database();
    $db = $database->getConnection();
    
    $product = new Product($db);
    
    $itemType = $_GET['itemType'];
    $stmt = $product->read($itemType);
    $num = $stmt->rowCount();

    if ($num > 0) {

        $products_arr=array();
        $products_arr["records"]=array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            extract($row);
    
            $product_item=array(
                "itemID" => $itemID,
                "itemCode" => $itemCode,
                "itemType" => $itemType,
                "itemName" => $itemName,
                "subtitle" => html_entity_decode($subtitle),
                "descriptions" => html_entity_decode($descriptions),
                "quantity" => $quantity,
                "price" => $price,
                "img_path" => $img_path
            );
    
            array_push($products_arr["records"], $product_item);

        }

        http_response_code(200);
        echo json_encode($products_arr);

    } else {

        http_response_code(404);
        echo json_encode(array(
            "message" => "No products found."
        ));
    }
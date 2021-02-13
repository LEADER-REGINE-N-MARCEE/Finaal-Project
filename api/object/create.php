<?php

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=utf-8");
    header("Access-Control-Allow-Methods: POST");

    include_once '../config/database.php';
    include_once '../models/product.php';

    $database = new Database();
    $db = $database->getConnection();

    $product = new Product($db);

    $data = json_decode(file_get_contents("php://input"));

    if (empty($data->itemID) || empty($data->itemCode) || empty($data->itemType) || empty($data->itemName) || empty($data->subtitle) || empty($data->quantity) || empty($data->descriptions) || empty($data->price) || empty($data->img_path) || empty($data->img_path3) || empty($data->img_path3))
    {

        http_response_code(400);
        echo json_encode(array(
            "message" => "Unable to create product. Data is incomplete."
        ));
        return;
    }
    $product->itemID = $data->itemID;
    $product->itemCode = $data->itemCode;
    $product->itemType = $data->itemType;
    $product->itemName = $data->itemName;
    $product->subtitle = $data->subtitle;
    $product->quantity = $data->quantity;
    $product->descriptions = $data->descriptions;
    $product->price = $data->price;
    $product->img_path = $data->img_path;

    if ($product->create()) {

        http_response_code(201);
        echo json_encode(array(
            "message" => "Product was created."
        ));
    } else {

        http_response_code(503);
        echo json_encode(array(
            "message" => "Unable to create product."
        ));
    }
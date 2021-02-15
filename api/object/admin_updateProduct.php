<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../config/database.php';
  include_once '../models/admin.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  $product = new Product($db);

  // Get raw producted data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to update
  $product->itemID = $data->itemID;

  $product->itemCode = $data->itemCode;
  $product->itemType = $data->itemType;
  $product->itemName = $data->itemName;
  $product->subtitle = $data->subtitle;
  $product->quantity = $data->quantity;
  $product->descriptions = $data->descriptions;
  $product->price = $data->price;
  /*$product->img_path = $data->img_path;
  $product->img_path2 = $data->img_path2;
  $product->img_path3 = $data->img_path3;*/

  // Update product
  if($product->update()) {
    echo json_encode(array(
        'message' => 'Product Updated'
        ));
  } else {
    echo json_encode(array(
        'message' => 'Product Not Updated'
        ));
  }


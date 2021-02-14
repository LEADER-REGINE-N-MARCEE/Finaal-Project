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
  $product->id = $data->id;

  $product->title = $data->title;
  $product->body = $data->body;
  $product->author = $data->author;
  $product->category_id = $data->category_id;

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


<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");

include_once '../config/database.php';
include_once '../models/userDB.php';
include_once '../models/product.php';
$databaseService = new Database(); #Database() is ung name ng class natin sa database.php
$conn = $databaseService->getConnection(); #getConnection() class para maaccess ung databse
$users = new User($conn); #initialize ung User class, parameter ung $conn para mavalidate if naka connect na sa database
$prod = new Product($conn);
$data = json_decode(file_get_contents("php://input"));

$usrID = $data->id;
$itemCode = $data->records[0]->itemCode;
$itemType = $data->records[0]->itemType;
$itemName = $data->records[0]->itemName;
$quantity = $data->amount;

$addtocart = $users->addtocart($usrID, $itemCode, $itemType, $itemName, $quantity);

if ($addtocart == true)
{
    $search = $prod->searchItem($itemCode);
    $num = $search->rowCount();
    if ($num > 0)
    {

        $products_arr = array();
        $products_arr["records"] = array();

        while ($row = $search->fetch(PDO::FETCH_ASSOC))
        {

            extract($row);

            $product_item = array(
                "itemID" => $itemID,
                "itemCode" => $itemCode,
                "itemType" => $itemType,
                "itemName" => $itemName,
                "subtitle" => html_entity_decode($subtitle) ,
                "descriptions" => html_entity_decode($descriptions) ,
                "quantity" => $quantity,
                "price" => $price,
                "img_path" => $img_path,
                "orderID" => $orderID,
                "amount" => $amount
            );

            array_push($products_arr["records"], $product_item);
            echo $products_item; 
        }
        $code = $products_arr["records"][0]['itemCode'];
        $stock = $products_arr["records"][0]['quantity'];

        $new_stock = $stock - $data->amount;


        http_response_code(200);
        $decrease = $prod->decreaseStock($code, $new_stock);

        if ($decrease){
            http_response_code(200);
            echo json_encode(array(
                "message" => "Successfully added to cart."
            ));
        }

        else {
            http_response_code(400);
            echo json_encode(array(
                "message" => "Unable to add to cart."
            ));
        }
    }
    else
    {

        http_response_code(404);
        echo json_encode(array(
            "message" => "No products found."
        ));
    }
    
}
else
{
    http_response_code(400);
    echo json_encode(array(
        "message" => "Unable to add to cart."
    ));
}
?>

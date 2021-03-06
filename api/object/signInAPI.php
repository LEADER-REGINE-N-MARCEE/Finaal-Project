<?php
include_once '../config/database.php';
require '../../vendor/autoload.php';

use \Firebase\JWT\JWT;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");

$email = '';
$password = '';
$e = null;

$databaseService = new Database();
$conn = $databaseService->getConnection();

$data = json_decode(file_get_contents("php://input"));

$email = $data->email;
$password = $data->password;

$table_name = 'users';

$query = "SELECT id, firstname, lastname, pass, roles FROM " . $table_name . " WHERE email = ? LIMIT 0,1";

$stmt = $conn->prepare($query);
$stmt->bindParam(1, $email);
$stmt->execute();
$num = $stmt->rowCount();

if ($num > 0)
{
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $id = $row['id'];
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $password2 = $row['pass'];
    $role = $row['roles'];

    if (password_verify($password, $password2))
    {

        $secret_key = "nwoWAkH3DltizN62b37V2zsyWf1QufF5";
        $issuer_claim = "Key.Corp"; // this can be the servername
        $audience_claim = "USER";
        $issuedat_claim = time(); // issued at
        $notbefore_claim = $issuedat_claim + 5; //not before in seconds
        $expire_claim = $issuedat_claim + 1800; // expire time in seconds
        $token = array(
            "iss" => $issuer_claim,
            "aud" => $audience_claim,
            "iat" => $issuedat_claim,
            "nbf" => $notbefore_claim,
            "exp" => $expire_claim,
            "data" => array(
                "id" => $id,
                "firstname" => $firstname,
                "lastname" => $lastname,
                "email" => $email,
                "role" => $role
            )
        );

        $jwt = JWT::encode($token, $secret_key);
        echo json_encode(array(
            "message" => "Successful login.",
            "jwt" => $jwt,
            "email" => $email,
            "expireAt" => $expire_claim
        ));

        http_response_code(202);
    }
    else
    {

        http_response_code(401);
        echo json_encode(array(
            "message" => "Login failed.",
            "password" => $password
        ));
    }
}
?>

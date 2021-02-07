<?php
#need include ung database config saka userDB *ung userdb para lang malaman kung existing na ung email
include_once '../config/database.php';
include_once '../models/userDB.php';

#para gumana ung api and security para sa form
header("Access-Control-Allow-Origin: * ");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

#initialize connection
$databaseService = new Database(); #Database() is ung name ng class natin sa database.php
$conn = $databaseService->getConnection(); #getConnection() class para maaccess ung databse
$users = new User($conn); #initialize ung User class, parameter ung $conn para mavalidate if naka connect na sa database
$data = json_decode(file_get_contents("php://input")); #kukuha nung json na ipapasa galing sa javascript
if (!empty($data->firstname) && !empty($data->lastname) && !empty($data->email) && !empty($data->password)) #check kung hindi empty ung ipapasa natin na data sa javscript

{ #then
    #iseset ung variable. $data means ung nasa json na ipinasa
    $firstName = $data->firstname; #$data -> firstname; para makuha ung value ng first name sa json
    $lastName = $data->lastname; #$data -> lastname; para makuha ung value ng last name sa json
    $email = $data->email; #$data -> email; para makuha ung value ng fiemail sa json
    $password = $data->password; #$data -> password; para makuha ung value ng password sa json
    

    $check = $users->emailCheck($email); #check email if exists, emailCheck() is ung class para macheck ung email. then irereturn nya ung true or false, pag nareturn na, ung laman ng $check will be true or false depende if it exists
    if ($check == false) #if false, continue sa pagadd sa database
    
    {
        $table_name = 'users'; #initialize ung name ng table, pwede rekta na rin sa query ung table name
        $query = "INSERT INTO " . $table_name . "
                    SET firstname = :firstname,
                        lastname = :lastname,
                        email = :email,
                        pass = :password,
                        roles='user'";

        $stmt = $conn->prepare($query); #prep the query
        

        #ibind na nya ung mga variables natin
        $stmt->bindParam(':firstname', $firstName);
        $stmt->bindParam(':lastname', $lastName);
        $stmt->bindParam(':email', $email);

        #password hashing. para hindi plain text ung password. need to use password_verify pag sa login na
        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        $stmt->bindParam(':password', $password_hash); #bind the password hash para ma insert sa database
        #execute statement
        #RESPONSE CODES PARA IPASA SA JAVASCRIPT KUNG SUCCESS BA O HINDI. ung message irereturn din nya i call nalang sa javascript (same sa all response code)
        if ($stmt->execute())
        {

            http_response_code(201);
            echo json_encode(array(
                "message" => "Successfully registered."
            ));
        }
        else
        {
            http_response_code(400);

            echo json_encode(array(
                "message" => "Unable to register the user."
            ));
        }
    }
    else
    {
        http_response_code(400);
        echo json_encode(array(
            "message" => "Email already exists."
        ));
    }

}
else
{
    http_response_code(400);

    echo json_encode(array(
        "message" => "Form incomplete. Please fill all the fields"
    ));
}
?>

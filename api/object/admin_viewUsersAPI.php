<?php

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=utf-8");
    header("Access-Control-Allow-Methods: POST");

    include_once '../config/database.php';
    include_once '../models/admin.php';

    $databaseService = new Database(); #Database() is ung name ng class natin sa database.php
    $conn = $databaseService->getConnection(); #getConnection() class para maaccess ung databse
    $product = new Product($conn);
    $users = new User($conn);

    $stmt = $users->viewUsers();
    $num = $stmt->rowCount();

    $users_overview_arr = array();
    $users_overview_arr["users"] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        
        extract($row);

        $users_list = array(
            "id" => $id,
            "firstname" => $firstname,
            "lastname" => $lastname,
            "email" => $email,
            "reg_date" => $reg_date
        );

        array_push($users_overview_arr["users"], $users_list);

    }

    http_response_code(200);
    echo json_encode($users_overview_arr, JSON_UNESCAPED_SLASHES);
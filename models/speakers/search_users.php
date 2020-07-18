<?php

require_once "../../config/connection.php";
require_once "functions.php";

if(isset($_POST['input'])){
    $input = strtolower($_POST['input']);

    $user = executeQuery("SELECT u.id, u.name, u.last_name, u.email, ud.description, ud.image, ud.image_sm FROM users AS u INNER JOIN user_data AS ud ON u.id = ud.user_id WHERE LOWER(CONCAT(u.name, ' ', u.last_name)) LIKE '%$input%'");
    $categories = get_all_categories();
    $grades = get_all_grades();

    $json = json_encode([
        "user" => $user,
        "categories" => $categories,
        "grades" => $grades
    ]);
    echo $json;
    // header("Content-type: application/json");
}
<?php

require_once "../../config/connection.php";
require "functions.php";

$user = get_all_users();
$categories = get_all_categories();
$grades = get_all_grades();

$json = json_encode([
    "user" => $user,
    "categories" => $categories,
    "grades" => $grades
]);
echo $json;
// header("Content-type: application/json");
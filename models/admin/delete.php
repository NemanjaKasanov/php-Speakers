<?php
require_once "../../config/connection.php";

$id = $_GET['id'];
$table = $_GET['table'];

$array = ['users', 'categories', 'images_entry', 'events', 'nav_elements'];

if(isset($_GET['id']) && in_array($_GET['table'], $array)){
    $query = "DELETE FROM $table WHERE id=$id";
    $connection->exec($query);
}

header("Location: ../../index.php?page=admin");
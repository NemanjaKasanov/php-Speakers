<?php
require_once "../../config/connection.php";

if(isset($_POST['submit'])){
    $category = $_POST['category'];

    $query = "INSERT INTO categories (category) VALUES ('$category')";
    $connection->exec($query);
}

header("Location: ../../index.php?page=admin");
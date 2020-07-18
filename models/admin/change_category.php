<?php
require_once "../../config/connection.php";

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $categ = $_POST['category'];

    $query = "UPDATE categories SET category = '$categ' WHERE id=$id";
    $connection->exec($query);
}

header("Location: ../../index.php?page=admin");
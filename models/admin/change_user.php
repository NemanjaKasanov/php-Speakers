<?php
require_once "../../config/connection.php";

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $admin = $_POST['admin'];
    $status = $_POST['status'];

    $query = "UPDATE users SET role = $admin, status = $status WHERE id=$id";
    $connection->exec($query);
}

header("Location: ../../index.php?page=admin");
<?php
require_once "../../config/connection.php";

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $href = $_POST['href'];
    $parent = $_POST['parent'];
    $level = $_POST['level'];
    $position = $_POST['position'];
    $status = $_POST['login_status'];

    $query = "UPDATE nav_elements SET name='$name', href='$href', parent=$parent, level=$level, position=$position, login_status=$status WHERE id_nav=$id";
    $connection->exec($query);
}

header("Location: ../../index.php?page=admin");
<?php
require_once "../../config/connection.php";

if(isset($_POST['submit'])){
    $name = $_POST['event_name'];
    $description = $_POST['event_description'];

    $query = "INSERT INTO events (event_name, event_description) VALUES ('$name', '$description')";
    $connection->exec($query);
}

header("Location: ../../index.php?page=admin");
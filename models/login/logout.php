<?php
require_once "../../config/connection.php";
session_start();

$id = $_SESSION['userId'];
$online_query = "DELETE FROM online WHERE user_id=$id";
$connection->exec($online_query);

session_destroy();
header("Location: ../../index.php");
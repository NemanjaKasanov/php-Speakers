<?php

require_once "../../config/connection.php";

if(isset($_GET['email']) && !empty($_GET['email']) && isset($_GET['rand']) && !empty($_GET['rand'])){
    $email = $_GET['email'];
    $rand = $_GET['rand'];

    $query = "SELECT email, rand_password, status FROM users WHERE email='$email' AND rand_password='$rand' AND status=0";
    $returned = executeQuery($query);

    if(count($returned) > 0){
        $updateQuery = "UPDATE users SET status=1 WHERE email='$email' AND rand_password='$rand' AND status=0";
        $connection->exec($updateQuery);
        
        header("Location: ../../index.php?page=verify&error=");
    }
    else{
        header("Location: ../../index.php?page=verify&error=yes");
    }
}
else{
    header("Location: ../../index.php?page=verify&error=yes");
}
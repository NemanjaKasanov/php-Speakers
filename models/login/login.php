<?php
session_start();

if(isset($_POST['sub_register'])){
    include "../../config/connection.php";

    $_SESSION['errors'] = [];

    $email = $_POST['email'];
    $pass = $_POST['pass'];
    
    $regexEmail = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
    $regexPass = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/";

    $errors = [];

    if(!preg_match($regexEmail, $email)) array_push($errors, "Invalid email format.");
    if(!preg_match($regexPass, $pass)) array_push($errors, "Invalid password format.");

    $pass = md5($pass);
    $query = "SELECT id, role, status, name, last_name, email FROM users WHERE email='$email' AND password='$pass'";
    $user = executeQuery($query);

    if(count($user) != 1) array_push($errors, "USER WITH THIS EMAIL OR PASSWORD NOT FOUND.");

    if(count($errors) == 0){
        if(count($user) == 1){
            $id = $user[0]->id;
            $role = $user[0]->role;
            $status = $user[0]->status;
            $sessionEmail = $user[0]->email;
            $sessionName = $user[0]->name;
            $sessionLName = $user[0]->last_name;

            $_SESSION['userId'] = $id;
            $_SESSION['userRole'] = $role;
            $_SESSION['userStatus'] = $status;
            $_SESSION['userEmail'] = $sessionEmail;
            $_SESSION['userName'] = $sessionName;
            $_SESSION['userLName'] = $sessionLName;

            $online_check = executeQuery("SELECT * FROM online WHERE user_id=$id");
            $time = time();

            if(count($online_check) == 0){
                $online_query = "INSERT INTO online (user_id, time) VALUES ($id, $time)";
                $connection->exec($online_query);
            }
            else{
                $online_query = "UPDATE online SET time=$time WHERE user_id=$id";
                $connection->exec($online_query);
            }

            header("Location: ../../index.php");
        }
    }
    else{
        $_SESSION['errors'] = $errors;

        header("Location: ../../index.php?page=login");
    }
}
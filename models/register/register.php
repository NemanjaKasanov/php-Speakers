<?php
session_start();

if(isset($_POST['sub_register'])){
    require_once "../../config/connection.php";

    $_SESSION['errors'] = [];

    $name = $_POST['name'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $rpass = $_POST['rpass'];

    $errors = [];

    $regexName = "/^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/";
    $regexEmail = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
    $regexPass = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/";

    if(!preg_match($regexName, $name)) array_push($errors, "Invalid name format.");
    if(!preg_match($regexName, $lname)) array_push($errors, "Invalid last name format.");
    if(!preg_match($regexEmail, $email)) array_push($errors, "Invalid email format.");
    
    $emailQuery = "SELECT * FROM users WHERE email='$email'";
    $emailAlreadyExists = executeQuery($emailQuery);
    $emailAlreadyExists = count($emailAlreadyExists);

    if($emailAlreadyExists >= 1) array_push($errors, "There is an account already registered to this email.");
    if(!preg_match($regexPass, $pass)) array_push($errors, "Password must include at least one uppercase, lowercase and a digit,and must be between 6 and 20 characters.");
    if($pass != $rpass) array_push($errors, "Passwords do not match.");

    if(count($errors) == 0){
        $pass = md5($pass);
        $rand = rand(111111111111111, 999999999999999);
        $rand = md5($rand);

        $registerQuery = "INSERT INTO users (name, last_name, email, password, role, status, rand_password) VALUES ('$name', '$lname', '$email', '$pass', 0, 0, '$rand')";

        $connection->exec($registerQuery);

        $subject = 'Account activation for Speakers.';
        $message = '
            Thank you for becoming a member of Speakers community.
            To activate your account click here: http://localhost:8080/speakers/models/register/verify.php?email='.$email.'&rand='.$rand;

        mail($email, $subject, $message, 'From: nemanja.srb1234@gmail.com');

        header("Location: ../../index.php?page=registerSuccess");
    }
    else{
        $_SESSION['errors'] = $errors;

        header("Location: ../../index.php?page=register");
    }
}

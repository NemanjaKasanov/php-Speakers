<?php
session_start();

if(isset($_POST['btn_speaker'])){
    require_once "../../config/connection.php";
    $_SESSION['errors'] = [];

    $image = $_FILES['profilePicture'];
    $text = $_POST['aboutYou'];

    $categories = [];
    foreach($_POST['category'] as $el){
        array_push($categories, $el);
    }

    $regexText = "/^[A-Za-z1-9\.\,\!\?\'\:\;\_\- ]{5,200}$/";
    $errors = [];

    if(count($categories) == 0) array_push($errors, "You must select at least one category.");
    if(!preg_match($regexText, $text)) array_push($errors, "Short description is required.");
    if(!is_uploaded_file($_FILES['profilePicture']['tmp_name'])) array_push($errors, "Upload the image of yourself to register as a speaker.");
    if($_FILES['profilePicture']['size'] > 2000000) array_push($errors, "Image must be under 2MB.");
    if($_FILES['profilePicture']['type'] != "image/jpeg" && $_FILES['profilePicture']['type'] != "image/png") array_push($errors, "File provided is not an image of .PNG or .JPG type.");

    if(count($errors) == 0){
        // UPLOAD ORIGINAL IMAGE
        $origName = $_FILES['profilePicture']['name'];
        $name = $_SESSION['userEmail']."__img__".$origName;
        $tmp = $image['tmp_name'];
        $path = "../../assets/images/users/$name";
        move_uploaded_file($tmp, $path);

        // IMAGE RESIZE AND WATERMARK
        $dimensions = getimagesize($path);
        $width = $dimensions[0];
        $height = $dimensions[1];

        $new_width = 250;
        $new_height = 250;
        $bg = imagecreatetruecolor($new_width, $new_height);

        $mark = imagecreatefrompng("../../assets/images/mark.png");

        if($_FILES['profilePicture']['type'] == "image/jpeg"){
            if(imagecreatefromjpeg($path)){
                $uploadedImg = imagecreatefromjpeg($path);
                imagecopyresampled($bg, $uploadedImg, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
                $nameSm = $_SESSION['userEmail']."__sm__".$origName;
                imagecopymerge($bg, $mark, 95,225,0,0,60,25, 30);

                imagejpeg($bg, "../../assets/images/users/$nameSm");
            }
            else{
                array_push($errors, "Corrupt image file!");
                $_SESSION['errors'] = $errors;
                header("Location: ../../index.php?page=account");
            }
        }
        else if($_FILES['profilePicture']['type'] == "image/png"){
            if(imagecreatefrompng($path)){
                $uploadedImg = imagecreatefrompng($path);
                imagecopyresampled($bg, $uploadedImg, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
                $nameSm = $_SESSION['userEmail']."__sm__".$origName;
                imagecopymerge($bg, $mark, 95,225,0,0,60,25, 30);

                imagepng($bg, "../../assets/images/users/$nameSm");
            }
            else{
                array_push($errors, "Corrupt image file!");
                $_SESSION['errors'] = $errors;
                header("Location: ../../index.php?page=account");
            }
        }
        
        // INSERT INTO THE DATABASE
        $user_id = $_SESSION["userId"];
        $rows_in = executeQuery("SELECT * FROM user_data WHERE user_id = $user_id");
        $categ_in = executeQuery("SELECT * FROM user_categories WHERE user_id = $user_id");

        if(count($rows_in) == 0){
            $userDataQuery = $connection->prepare("INSERT INTO user_data (user_id, description, image, image_sm) VALUES (:id, :desc, :image, :imagesm)");
        }
        else{
            $userDataQuery = $connection->prepare("UPDATE user_data SET description=:desc, image=:image, image_sm=:imagesm WHERE user_id=:id");
        }
        
        $userDataQuery->bindParam(':id', $user_id, PDO::PARAM_INT);
        $userDataQuery->bindParam(':desc', $text, PDO::PARAM_STR, 200);
        $userDataQuery->bindParam(':image', $name, PDO::PARAM_STR, 999);
        $userDataQuery->bindParam(':imagesm', $nameSm, PDO::PARAM_STR, 999);
        $userDataQuery->execute();

        if(count($categ_in) != 0){
            $delete_categ = "DELETE FROM user_categories WHERE user_id=$user_id";
            $connection->exec($delete_categ);
        }

        foreach($categories as $el){
            $categ_query = "INSERT INTO user_categories (user_id, category_id) VALUES ($user_id, $el)";
            $connection->exec($categ_query);
        }

        $_SESSION['changes'] = 'yes';

        header("Location: ../../index.php?page=account");
    }
    else{
        $_SESSION['errors'] = $errors;

        header("Location: ../../index.php?page=account");
    }
}
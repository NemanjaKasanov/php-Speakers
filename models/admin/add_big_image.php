<?php
require_once "../../config/connection.php";

if(isset($_POST['submit'])){
    $description = $_POST['description'];
    $image_name = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $size = $_FILES['image']['size'];
    $path = "../../assets/images/$image_name";

    if($size < 2000000){
        move_uploaded_file($tmp_name, $path);
        
        $query = "INSERT INTO images_entry (src, alt) VALUES ('assets/images/$image_name', '$description')";
        $connection->exec($query);
    }
}

header("Location: ../../index.php?page=admin");
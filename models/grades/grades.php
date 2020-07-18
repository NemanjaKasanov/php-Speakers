<?php
// session_start();
require_once "../../config/connection.php";

if(isset($_POST['sendGrade'])){
    $grade = $_POST['sendGrade'];
    $user = $_POST['sendUserId'];
    $speaker = $_POST['sendSpeakerId'];
    
    $userAlreadyGraded = "SELECT * FROM user_grades WHERE grader_id=$user AND user_id=$speaker";
    $isGraded = executeQuery($userAlreadyGraded);
    
    if(count($isGraded) == 0){
        $query = "INSERT INTO user_grades (user_id, grader_id, grade) VALUES ($speaker, $user, $grade)";
        $connection->exec($query);
    }
    else{
        $query = "UPDATE user_grades SET grade=$grade WHERE user_id=$speaker AND grader_id=$user";
        $connection->exec($query);
    }
}
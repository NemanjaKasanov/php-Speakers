<?php

require_once "../../config/connection.php";
require_once "functions.php";

$stars = $_POST['stars'];
$categories = $_POST['categ'];

$query_categories = "SELECT c.category, uc.user_id AS id FROM categories AS c INNER JOIN user_categories AS uc ON c.id = uc.category_id";
$query_grades = "SELECT ROUND(AVG(grade)) AS grade, u.id AS id FROM users AS u INNER JOIN user_grades AS ug ON u.id = ug.user_id";

// FILTERING BY GRADES (STARS)
// if(count($stars) > 1){
//     $query_grades .= " HAVING grade > 0 ";
//     if(in_array(5, $stars)){
//         $query_grades .= "AND grade = 5 ";
//     }
//     if(in_array(4, $stars)){
//         if(in_array(5, $stars)) $query_grades .= "OR grade = 4 ";
//         else $query_grades .= "AND grade = 4 ";
//     }
//     if(in_array(3, $stars)){
//         if(in_array(5, $stars) || in_array(4, $stars)) $query_grades .= "OR grade = 3 ";
//         else $query_grades .= "AND grade = 3 ";
//     }
//     if(in_array(2, $stars)){
//         if(in_array(5, $stars) || in_array(4, $stars) || in_array(3, $stars)) $query_grades .= "OR grade = 2 ";
//         else $query_grades .= "AND grade = 2 ";
//     }
//     if(in_array(1, $stars)){
//         if(in_array(5, $stars) || in_array(4, $stars) || in_array(3, $stars) || in_array(2, $stars)) $query_grades .= "OR grade = 1 ";
//         else $query_grades .= "AND grade = 1 ";
//     }
// }
// if(count($stars) == 1){
//     $query_grades = "SELECT AVG(grade) AS grade, u.id AS id FROM users AS u INNER JOIN user_grades AS ug ON u.id = ug.user_id GROUP BY u.id";
// }

if(count($stars) > 1){
    $switch = 0;
    for($i = 1; $i < count($stars); $i++){
        if($switch == 0){
            $query_grades .= " WHERE grade = ".$stars[$i];
            $switch = 1;
        }
        else{
            $query_grades .= " OR grade = ".$stars[$i];
        }
    }
    $query_grades .= " GROUP BY u.id";
}
if(count($stars) == 1){
    $query_grades = "SELECT AVG(grade) AS grade, u.id AS id FROM users AS u INNER JOIN user_grades AS ug ON u.id = ug.user_id GROUP BY u.id";
}

// FILTERING CATEGORIES
if(count($categories) > 1){
    $switch = 0;
    for($i = 1; $i < count($categories); $i++){
        if($switch == 0){
            $query_categories .= " WHERE c.id = ".$categories[$i];
            $switch = 1;
        }
        else{
            $query_categories .= " OR c.id = ".$categories[$i];
        }
    }
}

$users = get_all_users();
$categories = executeQuery($query_categories);
$grades = executeQuery($query_grades);

if(count($stars) > 1){
    $user = [];
    foreach($users as $el){
        foreach($grades as $grade){
            if($el->id == $grade->id){
                array_push($user, $el);
            }
        }
    }
}
else{
    $user = $users;
}

// USERS WITH SELECTED CATEGORIES
$users_by_categ = [];
foreach($categories as $el){
    if(!in_array($el->id, $users_by_categ)){
        array_push($users_by_categ, $el->id);
    }
}

$users_to_return = [];
foreach($user as $el){
    if(in_array($el->id, $users_by_categ)){
        array_push($users_to_return, $el);
    }
}
$user = $users_to_return;
$categories = get_all_categories();


$json = json_encode([
    "user" => $user,
    "categories" => $categories,
    "grades" => $grades
]);
echo $json;
// header("Content-type: application/json");
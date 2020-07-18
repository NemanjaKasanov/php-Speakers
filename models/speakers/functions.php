<?php

require_once "../../config/connection.php";

function get_all_users(){
    return executeQuery("SELECT u.id, u.name, u.last_name, u.email, ud.description, ud.image_sm FROM users AS u INNER JOIN user_data AS ud ON u.id = ud.user_id ORDER BY id DESC");
}

function get_all_categories(){
    return executeQuery("SELECT c.id, c.category, uc.user_id FROM categories AS c INNER JOIN user_categories AS uc ON c.id = uc.category_id");
}

function get_all_grades(){
    return executeQuery("SELECT AVG(grade) AS grade, u.id AS id FROM users AS u INNER JOIN user_grades AS ug ON u.id = ug.user_id GROUP BY u.id");
}

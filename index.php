<?php
session_start();

require_once "config/connection.php";
require_once "models/functions.php";

include "views/fixed/head.php";
include "views/fixed/nav.php";

if(!isset($_GET['page'])){
    include "views/entry.php";
    include "views/home.php";
}
else{
    switch($_GET['page']){
        case 'speakers':
            include 'views/page_top.php';
            include 'views/speakers.php';
        break;
        case 'login':
            include 'views/page_top.php';
            include 'views/login.php';
        break;
        case 'register':
            include 'views/page_top.php';
            include 'views/register.php';
        break;
        case 'aboutAuthor':
            include 'views/page_top.php';
            include 'views/aboutAuthor.php';
        break;
        case 'registerSuccess':
            include 'views/page_top.php';
            include 'views/registerSuccess.php';
        break;
        case 'verify':
            include 'views/page_top.php';
        break;
        case 'admin':
            include 'views/page_top.php';
            include 'views/admin.php';
        break;
        case 'account':
            include 'views/page_top.php';
            include 'views/account.php';
        break;
        case 'speaker':
            include 'views/page_top.php';
            include 'views/speaker.php';
        break;
        case 'change':
            include 'views/page_top.php';
            include 'views/change_data.php';
        break;
        case 'add':
            include 'views/page_top.php';
            include 'views/add_data.php';
        break;
    }
}

include "views/fixed/footer.php";
<?php
session_start();
//date_default_timezone_set("Asia/Dhaka");
define("DB_HOST", "localhost");
define("DB_USERNAME", "YOUR_USERNAME_HERE");
define("DB_PASS", "YOUR_USER_PASSWORD_HERE");
define("DB_NAME", "YOUR_DATABASE_NAME_HERE");
define("BASE_URL", "http://localhost/rideshare/");
//define("BASE_PATH","C://wamp/www/tims/");
define("BASE_PATH",__DIR__."/");
function goURL($url) {
    return BASE_URL.$url;
}
function getPATH($path) {
    return BASE_PATH.$path;
}
if(!defined("THIS_PAGE_TITLE")){
define("THIS_PAGE_TITLE", "Training Information Management System");
}






if(!defined("LOGED_USER_PRIVILEGE")){
define("LOGED_USER_PRIVILEGE", 0);
}
define("EMPLOYEE", 1);
define("COORDINATOR", 0);

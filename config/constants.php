<?php 
    //Start Session
    session_start();
    define('SITEURL', 'http://localhost/try/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'try');
    $conn = mysqli_connect('localhost', 'root', '') ; 
    $db_select = mysqli_select_db($conn, 'try') ; 
?>
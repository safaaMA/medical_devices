<?php 
    include "iraq.php";
    global $connect; 
    mysqli_set_charset($connect, 'utf8');
    $GetTokenUser = $_COOKIE["userToken"];

    setcookie('nameUser', null, -1, '/');
    setcookie('userToken', null, -1, '/');
    setcookie('userLogin', null, -1, '/');

    echo'<meta http-equiv="refresh" content="0, url=login.php" />';
    exit();
?>
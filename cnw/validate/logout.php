<?php
ob_start();
session_start();

if(array_key_exists("username", $_SESSION)){
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    header("Location: ../login");

    return;
}

if(array_key_exists("admin", $_SESSION)){
    unset($_SESSION['admin']);
    header("Location: ../home");
    exit();
}
header("Location: home");
exit();
?>

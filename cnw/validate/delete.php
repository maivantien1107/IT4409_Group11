<?php 
ob_start();
session_start();
$path_project = 'cnw';

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', $_SERVER['DOCUMENT_ROOT'] . DS . $path_project);


// check session
ob_start();
session_start();

$product_id = $_POST['product_id'];
$username = $_SESSION['username'];

require_once ROOT . DS . 'application' . DS . 'UsersApplication.php';
$service = new UsersApplication();
$service->removeProduct($product_id, $username);
// echo "<script>alert("Thêm thành công!")</script>"
header("Location: ../cart");
exit();

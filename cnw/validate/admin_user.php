<?php 
$path_project = 'cnw';
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', $_SERVER['DOCUMENT_ROOT'] . DS . $path_project);
require_once ROOT . DS . 'application' . DS . 'UsersApplication.php';
$app=new UsersApplication();
if (isset($_POST['btn-delete'])){
    $username=isset($_POST['btn-delete']) ?addslashes($_POST['btn-delete']):'';
    $app->insertAdmin($username);
}
header("Location: ../admin-user");
exit();
<?php

$path_project = 'cnw';

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', $_SERVER['DOCUMENT_ROOT'] . DS . $path_project);

require_once ROOT . DS . 'mvc' . DS . 'controllers' . DS . 'RouteController.php';
$url = isset($_GET["url"]) ? $_GET["url"] : "/";

// echo  $_SERVER['REQUEST_URI'];

$route = new RouteController($url);
$route->show();

<?php
require "../bootstrap.php";
require "../Controllers/ContactosController.php";

use Src\Controllers\ContactosController;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$uri = explode("/", $url);

// $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
// $uri = explode( '/', $uri );
// var_dump($uri);

// all of our endpoints start with /contactos
// everything else results in a 404 Not Found
if ($uri[4] !== 'contactos') {
    header("HTTP/1.1 404 Not Found");
    exit();
}

// the user id is, of course, optional and must be a number:
$userId = null;
if (isset($uri[5])) {
    $userId = (int) $uri[5];
}

$requestMethod = $_SERVER["REQUEST_METHOD"];

// pass the request method and user ID to the ContactosController and process the HTTP request:
$controller = new ContactosController($dbConnection, $requestMethod, $userId);
$controller->processRequest();
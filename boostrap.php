<?php
require 'vendor/autoload.php';
use Dotenv\Dotenv;

use PruebaAPI\System\DatabaseConnector;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$dbConnection = (new DatabaseConnector())->getConnection();
<?php
require 'vendor/autoload.php';
require 'System/DatabaseConnector.php';

use Dotenv\Dotenv;

use Src\System\DatabaseConnector;

$dotenv = new Dotenv(__DIR__ );
$dotenv->load();

$dbConnection = (new DatabaseConnector())->getConnection();
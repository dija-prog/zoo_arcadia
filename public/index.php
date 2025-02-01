<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Router;
use App\MongoConnection;
use Dotenv\Dotenv;


$dotenv = Dotenv::createImmutable(__DIR__ . '/../', '.env');
$dotenv->load();

MongoConnection::getInstance();
$router = new Router();
$controllerFqcn = $router->getControllerFqcn();
$method = $router->getMethod();
$params = $router->getParams();

$controller = new $controllerFqcn();
$controller->$method($params);


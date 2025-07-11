<?php

require_once __DIR__ . '/vendor/autoload.php';

require_once __DIR__ . '/../src/Router.php';


use App\Router;
use App\MongoConnection;
use Dotenv\Dotenv;


$dotenv = Dotenv::createImmutable(__DIR__ . '/../', '.env');
$dotenv->load();

// MongoConnection::getInstance();
$router = new Router();
$controllerFqcn = $router->getControllerFqcn();
$method = $router->getMethod();
$params = $router->getParams();

$controller = new $controllerFqcn();
$controller->$method($params);

if ($_SERVER['REQUEST_URI'] === '/') {
    header('Location: /Accueil');
    exit;
}

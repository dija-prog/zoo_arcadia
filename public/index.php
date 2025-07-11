<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/Router.php';


use App\Router;
use App\MongoConnection;
use Dotenv\Dotenv;


// Charger .env seulement s'il existe
$envPath = __DIR__ . '/../.env';
if (file_exists($envPath)) {
    $dotenv = Dotenv::createImmutable(__DIR__ . '/../', '.env');
    $dotenv->load();
}

var_dump(class_exists('App\Models\AvisModel'));


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

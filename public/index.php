<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/Router.php';

use App\Router;
use Dotenv\Dotenv;

// Charger .env seulement s'il existe
$envPath = __DIR__ . '/../.env';
if (file_exists($envPath)) {
    $dotenv = Dotenv::createImmutable(__DIR__ . '/../', '.env');
    $dotenv->load();
}

// Redirection avant toute sortie
if ($_SERVER['REQUEST_URI'] === '/') {
    header('Location: /Accueil');
    exit;
}

$router = new Router();
$controllerFqcn = $router->getControllerFqcn();
$method = $router->getMethod();
$params = $router->getParams();

$controller = new $controllerFqcn();
$controller->$method($params);

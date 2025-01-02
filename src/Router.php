<?php

namespace App;

class Router
{
    private string $controllerFqcn;
    private string $method;
    private array $params = [];

    public function __construct()
    {
        $this->getActiveRoute();
    }

    private function getActiveRoute() : void
    {
        $routes = [
            'GET' => [
                '/login' => ['App\\Controllers\\LoginController', 'showLogin'],
                '/admin' => ['App\\Controllers\\AdminController', 'index'],
                '/Accueil' => ['App\\Controllers\\AccueilController', 'index'],
                '/register' => ['App\\Controllers\\RegisterController', 'index'],
                '/contact' => ['App\\Controllers\\ContactController', 'showForm'],
                '/veterinaire' => ['App\\Controllers\\VeterinaireController','index'],
                '/habitat' => ['App\\Controllers\\HabitatController','index'],
                '/employe' => ['App\\Controllers\\employeController','index'],
                '/animalName/{animalName}' => ['App\\Controllers\\AnimalNameController','index'],
                '/add-animal' => ['App\\Controllers\\AnimalController', 'addAnimal'],
                '/addUserForm' => ['App\\Controllers\\UserController', 'addUser'],

                '/animaldelete/{animal_id}' => ['App\\Controllers\\AnimalController','deleteAnimal'],  
            ],
            'POST' => [
                '/Accueil' => ['App\\Controllers\\AccueilController', 'index'],
                '/register' => ['App\\Controllers\\UserController','createUser'],
                '/login' => ['App\\Controllers\\LoginController', 'authenticate'],
                '/contact' => ['App\\Controllers\\ContactController', 'contactForm'],
                '/addAnimal' => ['App\\Controllers\\AnimalController', 'addAnimal'],
                '/add-animal' => ['App\\Controllers\\AnimalController', 'addAnimalAjax'],
                '/addUserForm' => ['App\\Controllers\\UserController', 'addUser'],

            ],
        
        ];
        
        $uri = $_SERVER['REQUEST_URI'];
        $path = parse_url($uri, PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];
        
        // if($_SERVER['REQUEST_METHOD'] === 'GET') {
            
        //     if(isset($routes['GET'][$path])) {
            
        //         $this->controllerFqcn = $routes['GET'][$path][0];
        //         $this->method = $routes['GET'][$path][1];
        //         $this->params =  $routes['GET'][$path][1];
        //     } else {
        //         echo "Page introuvable.";
        //     }
        // }
        
        // if($_SERVER['REQUEST_METHOD'] === 'POST') {
        //     if(isset($routes['POST'][$path])) {
        //         $this->controllerFqcn = $routes['POST'][$path][0];
        //         $this->method = $routes['POST'][$path][1];
        //         $this->params =  $routes['GET'][$path][1];
        //     } else {
        //         echo "Page introuvab.";
        //     }
        // }

        
        $matchedRoute = null;

        
        if (isset($routes[$method])) {
            foreach ($routes[$method] as $route => $controllerData) {
                $pattern = preg_replace('#\{([a-zA-Z_][a-zA-Z0-9_]*)\}#', '(?P<\1>[^/]+)', $route);
                $pattern = "#^" . $pattern . "$#";
    
                if (preg_match($pattern, $path, $matches)) {
                    $matchedRoute = $controllerData;
                    foreach ($matches as $key => $value) {
                        if (!is_int($key)) {
                            $this->params[$key] = $value; 
                        }
                    }
                    break;
                }
            }
        }
    
        if ($matchedRoute) {
            $this->controllerFqcn = $matchedRoute[0];
            $this->method = $matchedRoute[1]; 
        } else {
            throw new \Exception("Route introuvable : " . $path);
            exit;
        }
    }

    public function getControllerFqcn() : string
    {
        return $this->controllerFqcn;
    }

    public function getMethod() : string
    {
        return $this->method;
    }
    public function getParams() : array
    {
        return $this->params;
    }
}

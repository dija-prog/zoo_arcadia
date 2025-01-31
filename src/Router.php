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
                '/Accueil' => ['App\\Controllers\\AccueilController', 'index'],
                '/contact' => ['App\\Controllers\\ContactController', 'showForm'],
                '/register' => ['App\\Controllers\\RegisterController', 'index'],
                '/login' => ['App\\Controllers\\LoginController', 'showLogin'],
                '/admin' => ['App\\Controllers\\AdminController', 'index'],
                '/veterinaire' => ['App\\Controllers\\VeterinaireController','index'],
                '/employe' => ['App\\Controllers\\EmployeController','index'],
                
                '/habitat' => ['App\\Controllers\\HabitatController','index'],
                '/animalName/{animalName}' => ['App\\Controllers\\AnimalNameController','index'],
                
                '/add-animal' => ['App\\Controllers\\AnimalController', 'addAnimal'],
                '/edit_animal/{animal_id}' => ['App\\Controllers\\AnimalController', 'editAnimal'],
                '/animaldelete/{animal_id}' => ['App\\Controllers\\AnimalController','deleteAnimal'],
                
                '/logout' => ['App\\Controllers\\AuthController','logout'],  
                
                '/deleteAvis/{avis_id}' => ['App\\Controllers\\EmployeController', 'deleteAvis'],
                '/updateAvis/{avis_id}' => ['App\\Controllers\\EmployeController', 'updateAvis'],
                '/validerAvis/{avis_id}' => ['App\\Controllers\\EmployeController','validerAvis'],
                
                
                '/addUser' => ['App\\Controllers\\AdminController', 'addUserWithEmail'],
                '/deleteUser/{username}' => ['App\\Controllers\\UserController','deleteUser'], 
                '/edit_user/{username}' => ['App\\Controllers\\UserController','updateUser'],
                
                '/edit_service/{service_id}' => ['App\\Controllers\\ServiceController', 'editService'],
                '/add_service' => ['App\\Controllers\\ServiceController','add_Services'],
                '/deleteService/{id}' => ['App\\Controllers\\ServiceController','deleteService'],  
                
                '/add_food' => ['App\\Controllers\\FoodController','addFood'],
                '/edit_food/{id_food}' => ['App\\Controllers\\FoodController','editFood'],
                '/deleteFood/{id_food}' => ['App\\Controllers\\FoodController','deleteFood'],

                '/veterinaire/{animal_id}' => ['App\\Controllers\\VeterinaireController',' getRapportJoinAnimal'],

                '/addCommentHabitat' => ['App\\Controllers\\VeterinaireController','addCommentHabitat'],

                '/rapport' => ['App\\Controllers\\RapportController','index'],

                '/forgot_password'=> ['App\\Controllers\\UserController', 'showForgotPasswordForm'],

                '/reset_password'=> ['App\\Controllers\\UserController', 'showResetPasswordForm'],


                '/incrementView/{animal_id}' => ['App\\Controllers\\AnimalController', 'incrementView'],

 


            ], 
            'POST' => [
                '/Accueil' => ['App\\Controllers\\AccueilController', 'index'],
                '/register' => ['App\\Controllers\\UserController','addUser'],
                '/login' => ['App\\Controllers\\LoginController', 'authenticate'],
                '/contact' => ['App\\Controllers\\ContactController', 'contactForm'],
                
                '/add_service' => ['App\\Controllers\\ServiceController','add_Services'],
                '/edit_service/{service_id}' => ['App\\Controllers\\ServiceController', 'editService'], 
                
                '/add_food' => ['App\\Controllers\\FoodController', 'addFood'],
                '/edit_food/{id_food}' => ['App\\Controllers\\FoodController','editFood'],

                '/addAnimal' => ['App\\Controllers\\AnimalController', 'addAnimal'],
                '/add-animal' => ['App\\Controllers\\AnimalController', 'addAnimalAjax'],

                '/addUser' => ['App\\Controllers\\AdminController', 'addUserWithEmail'],
                '/edit_user/{username}' => ['App\\Controllers\\UserController','updateUser'], 
                
                '/rapport' => ['App\\Controllers\\RapportController','index'],

                '/validerAvis/{avis_id}' => ['App\\Controllers\\EmployeController','validerAvis'],

                '/veterinaire' => ['App\\Controllers\\VeterinaireController','addCommentHabitat'],
                
                '/forgot_password'=> ['App\\Controllers\\UserController', 'handleForgotPassword'],
                '/reset_password'=> ['App\\Controllers\\UserController', 'handleResetPassword'],


                
                '/incrementView/{animal_id}' => ['App\\Controllers\\AnimalController', 'incrementView'],



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

<?php
namespace App\Controllers;
use App\Models\RegisterModel;

class RegisterController
{
    public function index()
    {
        $registerModel= new RegisterModel();
        
        $roles =  $registerModel  ->getRegister();
        
        require_once __DIR__ . '/../views/register.php';

    }
    
}
?>
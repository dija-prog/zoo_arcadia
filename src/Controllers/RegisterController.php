<?php
namespace App\Controllers;
use App\Models\RegisterModel;

class RegisterController
{
    public function index()
    {
        $registerModel= new RegisterModel();
        
        $roles =  $registerModel  ->getRegister();
        //inclure la vue avec les données 

        require_once __DIR__ . '/../views/register.php';

    }
    // ghikan artskert ghid
}
?>
<?php
namespace App\Controllers;

class AuthController
{
    public function logout()
    {
        // Démarre la session si elle n'est pas déjà démarrée
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Vide les données de la session
        $_SESSION = array();

        // Détruit la session
        session_destroy();

        // Redirige vers la page de login
        header('Location: /login');
        exit();
    }
}

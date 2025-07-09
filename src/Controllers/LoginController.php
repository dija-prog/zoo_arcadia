<?php

namespace App\Controllers;

use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mime\Email;
use App\models\UserModel;

class LoginController
{
    private $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }


    public function showLogin()
    {
        require_once __DIR__ . '/../views/login.php';
    }


    public function authenticate()
    {
        if (isset($_POST['valider']) && !empty($_POST['username']) && !empty($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $remember = isset($_POST['remember']);

            $userModel = new UserModel();
            $user = $userModel->getUserByUsername($username);

            if ($user) {
                if (password_verify($password, $user['password'])) {
                    session_start();
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['role'] = $user['role_id'];
                    $_SESSION['prenom'] = $user['prenom'];
                    $_SESSION['nom'] = $user['nom'];

                    define('ADMIN', 1);
                    define('EMPLOYE', 2);
                    define('VETERINAIRE', 3);

                        //créer une cookie 
                    if ($remember) {
                        setcookie('username', $username, time() + (86400 * 30), "/");
                    } else {
                        // Sinon, on supprime le cookie s'il existe
                        setcookie('username', '', time() - 3600, "/");
                    }

                    if ($user['role_id'] == ADMIN) {
                        header("Location: /admin");
                    } elseif ($user['role_id'] == EMPLOYE) {
                        header("Location: /employe");
                    } elseif ($user['role_id'] == VETERINAIRE) {
                        header("Location: /veterinaire");
                    }
                    exit;
                } else {
                    $error = "Mot de passe incorrect.";
                }
            } else {
                echo "Utilisateur non trouvé.";
            }
            // } else {
            //             $errors = [];
            //             if (empty($_POST['username']) || !filter_var($_POST['username'], FILTER_VALIDATE_EMAIL)) {
            //                 $errors['email'] = 'Adresse e-mail invalide.';
            //             }
            //             if (empty($_POST['password']) || strlen($_POST['password']) < 6) {
            //                 $errors['password'] = 'Le mot de passe doit contenir au moins 6 caractères.';
            //             }

            //             // Retourne une réponse JSON
            //             if (!empty($errors)) {
            //                 echo json_encode(['success' => false, 'errors' => $errors]);
            //             } else {
            //                 echo json_encode(['success' => true]);
            //             }
        }

        require_once __DIR__ . '/../views/login.php';
    }
}

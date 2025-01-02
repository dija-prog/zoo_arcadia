<?php

namespace App\Controllers;

use App\models\UserModel;

class LoginController
{
    public function showLogin()
    {
        require_once __DIR__ .'/../views/login.php';
    }

    public function authenticate()
    {
        if (isset($_POST['valider']) && !empty($_POST['username']) && !empty($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

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

                    if ($user['role_id'] == ADMIN) {
                        header("Location: /admin");
                    } elseif ($user['role_id'] == EMPLOYE) {
                        header("Location: ../roles/employé.php");
                    } elseif ($user['role_id'] == VETERINAIRE) {
                        header("Location: /veterinaire");
                    }
                    exit;
                } else {
                    echo "Mot de passe incorrect.";
                }
            } else {
                echo "Utilisateur non trouvé.";
            }
        } else {
            echo "Veuillez remplir tous les champs.";
        }
    }
}

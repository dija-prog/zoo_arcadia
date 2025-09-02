<?php

namespace App\Controllers;

use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mime\Email;
use App\Models\UserModel;

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
    header('Content-Type: application/json'); // on force JSON

    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $remember = isset($_POST['remember']);

        $user = $this->userModel->getUserByUsername($username);

        if ($user) {
            if (password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role_id'];
                $_SESSION['prenom'] = $user['prenom'];
                $_SESSION['nom'] = $user['nom'];

                if ($remember) {
                    setcookie('username', $username, time() + (86400 * 30), "/");
                } else {
                    setcookie('username', '', time() - 3600, "/");
                }
                echo json_encode([
                    'success' => true,
                    'role' => $user['role_id']
                ]);
                return;
            } else {
                echo json_encode([
                    'success' => false,
                    'message' => 'Mot de passe incorrect'
                ]);
                return;
            }
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Utilisateur non trouvé'
            ]);
            return;
        }
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Veuillez remplir tous les champs'
        ]);
        return;
    }
}

}

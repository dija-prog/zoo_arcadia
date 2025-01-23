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
        $this->userModel= new UserModel();
    }

    
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

        require_once __DIR__ .'/../views/login.php';
    }

    public function forgotPassword()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = htmlspecialchars($_POST['username']);

            // Vérifiez si l'utilisateur existe
            $query = $this->userModel->getUserByUsername($username);

            if ($query) {
                // Génération du token
                $token = bin2hex(random_bytes(15));

                // Mise à jour du token dans la base de données
                $this->userModel->updateResetToken($username, $token);

                // Créez le lien de réinitialisation
                $resetLink = "http://localhost/reset_password?token=" . $token;

                // Configurez le transport et le mailer
                $transport = Transport::fromDsn($_ENV['MAILER_DS']);
                $mailer = new Mailer($transport);

                // Créez l'email
                $email = (new Email())
                    ->from('aithamouk94@gmail.com') 
                    ->to($username) 
                    ->subject('Réinitialisation de mot de passe')
                    ->html("<p>Bonjour,</p>
                            <p>Cliquez sur ce lien pour réinitialiser votre mot de passe :</p>
                            <a href=\"$resetLink\">Réinitialiser le mot de passe</a>");

                // Envoyez l'email
                try {
                    $mailer->send($email);

                    echo "Un lien de réinitialisation a été envoyé.";
                    
                } catch (\Exception $e) {
                    echo "Erreur lors de l'envoi de l'email : " . $e->getMessage();
                }
            } else {
                echo "Cet email n'existe pas.";
            }
        } else {
            require_once __DIR__ . '/../views/forgot_password.php';
        }
    }

    public function resetPassword($token)
    {
       // Récupérer le token de l'URL
       // $token = $params['token'] ?? null;
    
        $token = isset($_GET['token']) ? $_GET['token'] : "";
       // $token = $_POST['token'] ?? null;
    
        if (!$token) {
            die("Le token est manquant.");
        }
        echo "Token reçu : " . htmlspecialchars($token);
        
        // Vérification du token et gestion de la réinitialisation du mot de passe
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reset'])) {
            $hashedToken = $_POST['token'] ?? null;
            $password = $_POST['password'] ?? null;
            $confirmPassword = $_POST['confirm_password'] ?? null;

            if (password_verify($token, $hashedToken)) {
                echo "Le jeton est valide !";
            } else {
                echo "Le jeton est invalide.";
            }

            // if ($hashedToken!== $token) {
            //     echo "Le token soumis est invalide.";
            //     return;
            // }

            if ($password !== $confirmPassword) {
                echo "Les mots de passe ne correspondent pas.";
                return;
            }

            $user = $this->userModel->findByResetToken($token);
            if (!$user) {
                echo "Token invalide ou expiré.";
                return;
            }

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Mettez à jour le mot de passe dans la base de données
            $updated = $this->userModel->updatePassword($user['username'], $hashedPassword);

            if ($updated) {
                echo "Votre mot de passe a été réinitialisé avec succès.";
            } else {
                echo "Erreur lors de la réinitialisation du mot de passe.";
            }
        }

        require_once __DIR__ . '/../views/reset_password.php';
    }


}

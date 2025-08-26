<?php

namespace App\Controllers;

use App\Models\UserModel;
use PDO;
use PDOException;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mime\Email;




class UserController
{
    private $UserModel;
    public function __construct()
    {
        $this->UserModel = new UserModel();
    }

    public function index()
    {

        $username = urldecode($_GET['username']);
        $nom = $_GET['nom'];
        $prenom = $_GET['prenom'];
        $password = $_GET['password'];
        $role_id = $_GET['role_id'];
        $userModel = new UserModel();
        $sql = $userModel->addUser($nom, $prenom, $username, $password, $role_id);

        require_once __DIR__ . '../views/admin.php';
    }


    public function addUser($username)
    {
        if (isset($_POST['Inscrire'])) {
            // Vérification des champs requis
            $users = ['prenom', 'nom', 'role_id', 'username', 'password'];
            foreach ($users as $user) {
                if (empty($_POST[$user])) {
                    echo "Le champ {$user} est requis.";
                    return;
                }
            }

            // Récupération  des données du formulaire et sécurisation
            $prenom = trim($_POST['prenom']);
            $nom = trim($_POST['nom']);
            $role_id = (int) $_POST['role_id'];
            $username = trim($_POST['username']);
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $user = new UserModel();

            // Try/Catch 
            try {
                $Result = $user->addUser($nom, $prenom, $role_id, $username, $password);

                if ($Result) {
                    // Redirection vers la vue selon le rôle
                    if ($role_id === 2) {
                        header('Location:/login');
                    } elseif ($role_id === 3) {
                        header('Location:/login');
                    } else {
                        echo "Rôle non reconnu.";

                    }
                } else {
                    echo "Ce nom d'utilisateur existe déjà ou une erreur est survenue.";
                }
            } catch (PDOException $e) {
                // Gestion propre de l'exception
                if ($e->getCode() == 23000) {
                    echo '<div class="alert alert-danger" role="alert">
                Ce nom d\'utilisateur existe déjà, veuillez en choisir un autre.
                    </div>';
                
                } else {
                    echo '<div class="alert alert-danger" role="alert">
                Erreur lors de la création de l\'utilisateur : ' . $e->getMessage() . '
                    </div>';
                
                }
            }
        }

        require_once __DIR__ . '/../views/login.php';
    }



    public function updateUser($username)
    {
        $username = $username['username'];
        if (isset($_POST['submit'])) {

            $prenom = htmlspecialchars($_POST['prenom']);
            $nom = htmlspecialchars($_POST['nom']);
            $username = htmlspecialchars($_POST['username']);
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $role_id = intval($_POST['role_id']);

            // Vérification des champs requis
            if (empty($prenom) || empty($nom) || empty($username) || empty($password) || empty($role_id)) {
                echo "Tous les champs sont requis.";
                return;
            }

            // Appel au modèle pour la mise à jour
            $result = $this->UserModel->updateUser($nom, $prenom, $password, $role_id, $username);

            if ($result) {
                echo "Utilisateur mis à jour avec succès.";
                header("Location:/admin#usertable");
            } else {
                echo "Erreur lors de la mise à jour de l'utilisateur.";
            }
        } else {

            $user = $this->UserModel->getUserByUsername($username);
            $User = [
                'nom' => $user['nom'],
                'prenom' => $user['prenom'],
                'username' => $user['username'],
                'password' => '',
                'role_id' => $user['role_id']
            ];
            require_once __DIR__ . "/../views/CRUD/edit_user.php";
        }
    }

    public function deleteUser($username)
    {
        if (empty($username)) {
            return "Erreur : Le nom d'utilisateur est requis.";
        }
        if ($this->UserModel->deleteUser($username)) {

            header("Location:/admin#usertable");
        } else {
            echo "Erreur lors de la suppression de utilisateur";
        }
    }

    // Afficher le formulaire "Mot de passe oublié"
    public function showForgotPasswordForm()
    {
        require __DIR__ . '/../views/forgot_password.php';
    }

    // Traiter la demande de réinitialisation
    public function handleForgotPassword()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];

            // Vérifier si l'utilisateur existe
            $user = $this->UserModel->getUserByUsername($username);
            if ($user) {
                // Générer un token et une date d'expiration
                $token = bin2hex(random_bytes(50));
                $expiry = date('Y-m-d H:i:s', strtotime('+1 hour'));

                // Mettre à jour l'utilisateur avec le token
                $this->UserModel->updateResetToken($username, $token, $expiry);

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
        }
    }


    // Afficher le formulaire de réinitialisation
    public function showResetPasswordForm($token)
    {
        $token = $_GET['token'] ?? '';
        $user = $this->UserModel->findByResetToken($token);
        if ($user) {
            require __DIR__ . '/../views/reset_password.php';
        } else {
            echo "Token invalide ou expiré.";
        }
    }

    // Traiter la réinitialisation du mot de passe
    public function handleResetPassword()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $token = $_POST['token'];
            $password = $_POST['password'];

            $user = $this->UserModel->findByResetToken($token);
            if ($user) {
                // Mettre à jour le mot de passe
                $this->UserModel->updatePassword($user['username'], $password);
                require __DIR__ . '/../views/reset_password_success.php';
            } else {
                echo "Token invalide ou expiré.";
            }
        }
    }
}

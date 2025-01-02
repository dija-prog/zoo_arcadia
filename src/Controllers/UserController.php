<?php
namespace App\Controllers;

use App\Models\UserModel;
use PDO;
use PDOException;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;

class UserController
{    
    private $UserModel;

    public function index()
    {   
        $username = $_GET['username'];
        $nom = $_GET['nom'];
        $prenom = $_GET['prenom'];
        $password = $_GET['password'];
        $role_id = $_GET['role_id'];
        $userModel = new UserModel();
        $sql = $userModel-> addUser($nom, $prenom, $username, $password, $role_id);
        $req = $userModel -> deleteUser($username);
        $result = $userModel->updateUser();


    }
    public function addUser($username)//céation da compte (page:register)
    {
        if (isset($_POST['Inscrire'])) {
            // Vérification des champs requis
            $users = ['prenom', 'nom', 'username', 'password', 'role_id'];
            foreach ($users as $user) {
                if (empty($_POST[$user])) {
                    echo "Le champ {$user} est requis.";
                    return;
                }
            }

            // Récupération et sécurisation des données
            $prenom = htmlspecialchars($_POST['prenom']);
            $nom = htmlspecialchars($_POST['nom']);
            $username = htmlspecialchars($_POST['username']);
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $role_id = (int) $_POST['role_id']; // Convertir en entier pour éviter des failles

            
            $user = new UserModel();
            $Result = $user->addUser($nom, $prenom, $username, $password, $role_id);

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
                echo "Erreur lors de la création de l'utilisateur.";
            }
        }
    }

    public function sendEmail($nom, $prenom, $username, $password, $role_id, $to)
    {
        //Ajouter dans la base de données
        $add = $this->UserModel->addUser($nom, $prenom, $username, $password, $role_id);
        header ("Location :/admin/users");
        if($add){
            //envoie de l'email
            try {
                $transport = Transport::fromDsn($_ENV['MAILER_DSN']); 
                $mailer = new Mailer($transport);

                $email = (new Email())
                    ->from('aithamouk94@gmail.com')
                    ->to($to)
                    ->subject('Création de compte')
                    ->text("Bonjour $prenom $nom,\n\nVotre compte a été créé avec succès. Veuillez contacter l'administrateur pour plus d'informations.");

                $mailer->send($email);
            } catch (PDOException $e) {
                throw new PDOException("Erreur lors de l'envoi de l'e-mail : " . $e->getMessage());
            }
        }
        require_once __DIR__ . '/../views/CRUD/addUserForm.php';
    }
    
    public function updateUser($nom, $prenom, $username,$password, $role_id)
    {
        if (isset($_POST['submit'])) {
            $prenom = htmlspecialchars($_POST['prenom']);
            $nom = htmlspecialchars($_POST['nom']);
            $username = htmlspecialchars($_POST['username']);
            $password = $_POST['password'];
            $role_id = intval($_POST['role_id']);
            
            // Vérification des champs requis
            if (empty($prenom) || empty($nom) || empty($username) ||empty($password) ||empty($role_id)) {
                echo "Tous les champs sont requis.";
                return;
            }
    
            // Appel au modèle pour la mise à jour
            $result = $this->UserModel->updateUser( $nom, $prenom, $username,$password, $role_id);
    
            if ($result) {
                echo "Utilisateur mis à jour avec succès.";
                header("Location:/admin.php#usertable");
            } else {
                echo "Erreur lors de la mise à jour de l'utilisateur.";
            }
        } else {
            echo "Méthode de requête non autorisée.";
        }
    }
        
        
    }
?>

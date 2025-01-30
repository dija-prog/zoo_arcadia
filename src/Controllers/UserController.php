<?php
namespace App\Controllers;

use App\Models\UserModel;
use PDO;


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
        $sql = $userModel-> addUser($nom, $prenom, $username, $password, $role_id);
    
        require_once __DIR__. '../views/admin.php';


    }
    public function addUser($username)//céation da compte (page:register)
    {
        if (isset($_POST['Inscrire'])) {
            // Vérification des champs requis
            $users = ['prenom', 'nom', 'role_id','username','password'];
            foreach ($users as $user) {
                if (empty($_POST[$user])) {
                    echo "Le champ {$user} est requis.";
                    return;
                }
            }

            // Récupération et sécurisation des données
            $prenom = htmlspecialchars($_POST['prenom']);
            $nom = htmlspecialchars($_POST['nom']);
            $role_id = (int) $_POST['role_id']; // Convertir en entier pour éviter des failles
            $username = htmlspecialchars($_POST['username']);
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            
            $user = new UserModel();
            $Result = $user->addUser($nom, $prenom,$role_id, $username, $password);

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

        require_once __DIR__ . '/../views/login.php';
    }

    
    
    public function updateUser($username)
    {
        $username = $username['username'];
        if (isset($_POST['submit'])) { 
            
            $prenom = htmlspecialchars($_POST['prenom']);
            $nom = htmlspecialchars($_POST['nom']);
            $username = htmlspecialchars($_POST['username']);
            $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
            $role_id = intval($_POST['role_id']);
            
            // Vérification des champs requis
            if (empty($prenom) || empty($nom) || empty($username) ||empty($password) ||empty($role_id)) {
                echo "Tous les champs sont requis.";
                return;
            }
    
            // Appel au modèle pour la mise à jour
            $result = $this->UserModel->updateUser($nom,$prenom,$password,$role_id,$username);  
    
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
            require_once __DIR__. "/../views/CRUD/edit_user.php";

        }
    }
    
    public function deleteUser($username) 
    {   
        if (empty($username)) {
            return "Erreur : Le nom d'utilisateur est requis.";
        }
        if($this->UserModel->deleteUser($username)) {
           
            header("Location:/admin#usertable");

        }else {
            echo "Erreur lors de la suppression de utilisateur";
            
        }
    }

    
        
        
    }


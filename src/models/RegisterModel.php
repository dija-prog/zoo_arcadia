<?php

namespace App\Models;

use App\Database;
use PDO;

class RegisterModel
{
    private $pdo;
    public function __construct()
    {
        $db = new Database();
        $this->pdo = $db->getPdo();
    }

    public function getRegister()
    {
        if(isset($_POST['Inscrire'])){ 
            
            if(!empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['role_id'])){
                
                $prenom = htmlspecialchars($_POST['prenom']);
                $nom = htmlspecialchars($_POST['nom']);
                $username = htmlspecialchars($_POST['username']);
                $hash = password_hash($_POST['password'],PASSWORD_DEFAULT);
                $role_id = htmlspecialchars($_POST['role_id']);
                // Vérifier que le rôle sélectionné n'est pas admin
                $checkrole = $this->pdo->prepare("SELECT nom_role FROM role WHERE role_id = ?");
                $checkrole->execute(array($role_id));
                $role = $checkrole->fetch(PDO::FETCH_ASSOC);
        
                $insertUser = $this->pdo->prepare("INSERT INTO utilisateur (prenom, nom, username, password, role_id) VALUES(?,?,?,?,?)");
                    if($insertUser->execute(array($prenom, $nom, $username, $hash, $role_id))){ 
                        echo "Inscription réussie !";
                        header("Location: /login");
                        exit; // Arrêter l'exécution après redirection
                    } else {
                        echo "Erreur lors de l'inscription.";
                    }

                if($role['nom_role'] == 'admin'){
                    echo "Vous ne pouvez pas vous inscrire en tant qu'admin !";
                    exit;
                     // Insertion des données dans la base de données
                    $insertUser = $this->pdo->prepare("INSERT INTO utilisateur (prenom, nom, username, password, role_id) VALUES(?,?,?,?,?)");
                    if($insertUser->execute(array($prenom, $nom, $username, $hash, $role_id))){ 
                        echo "Inscription réussie !";
                        header("Location: /login ");
                        exit; // Arrêter l'exécution après redirection
                    } else {
                        echo "Erreur lors de l'inscription.";
                    }

                }else{
                    echo "Veuillez compléter tous les champs...";
                }
            }
            
        }
        // SELECT ROLES 
        $roles = $this->pdo->query("SELECT * FROM role WHERE role_id !='1'")->fetchAll();
        return $roles;
    }


}

?>
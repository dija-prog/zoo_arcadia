<?php

namespace App\Models;

use App\Database;
use PDO;
use PDOException;

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
    if (isset($_POST['Inscrire'])) { 
        
        if (!empty($_POST['prenom']) && !empty($_POST['nom']) && 
            !empty($_POST['username']) && !empty($_POST['password']) && 
            !empty($_POST['role_id'])) {

            $prenom   = trim($_POST['prenom']);
            $nom      = trim($_POST['nom']);
            $username = trim($_POST['username']);
            $hash     = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $role_id  = (int)$_POST['role_id'];

            // Vérifier que le rôle existe
            $checkrole = $this->pdo->prepare("SELECT nom_role FROM role WHERE role_id = ?");
            $checkrole->execute([$role_id]);
            $role = $checkrole->fetch(PDO::FETCH_ASSOC);

            if (!$role) {
                echo "Rôle invalide.";
                return;
            }

            // Interdire la création d'un admin
            if ($role['nom_role'] === 'admin') {
                echo "Vous ne pouvez pas vous inscrire en tant qu'administrateur.";
                return;
            }

            try {
                // Insertion sécurisée
                $insertUser = $this->pdo->prepare(
                    "INSERT INTO utilisateur (prenom, nom, username, password, role_id) VALUES (?, ?, ?, ?, ?)"
                );

                if ($insertUser->execute([$prenom, $nom, $username, $hash, $role_id])) {
                    header("Location: /login");
                    exit;
                } else {
                    echo "Erreur lors de l'inscription.";
                    
                }

            } catch (PDOException $e) {
                
                if ($e->getCode() == 23000) {
                    echo "Ce nom d'utilisateur est déjà utilisé.";
                } else {
                    echo "Erreur lors de l'inscription : " . $e->getMessage();
                }
            }

        } else {
            echo "Veuillez compléter tous les champs.";
            
        }
    }

    // Retourner les rôles (sauf admin = id=1)
    $roles = $this->pdo->query("SELECT * FROM role WHERE role_id != 1")->fetchAll();
    return $roles;
}

}


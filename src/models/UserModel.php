<?php
namespace App\Models;

use App\Database;
use PDO;

class UserModel
{
  private $pdo;
  public function __construct()
  {
    $db = new Database();
    $this->pdo = $db->getPdo();
  }

  public function getNonAdminUsers()
  {
    $query = "SELECT * FROM utilisateur WHERE role_id != 1";
    $stmt = $this->pdo->prepare($query);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $users;

  }

  public function addUser($nom, $prenom, $role_id, $username, $password)
    {
        $sql = "INSERT INTO utilisateur (nom, prenom, role_id, username, password) 
                VALUES (:nom, :prenom, :role_id, :username, :password)";

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':role_id' => $role_id,
            ':username' => $username,
            ':password' => $password
        ]);
    }

  public function getUserByUsername($username)
  {
        $query = $this->pdo->prepare('SELECT * FROM utilisateur WHERE username = ?');
        $query->execute([$username]);
        return $query->fetch(PDO::FETCH_ASSOC);
  }

  public function updateUser($nom,$prenom,$password,$role,$username)
  {
    var_dump($nom,$prenom,$password,$role,$username);
    $req = $this->pdo->prepare("UPDATE utilisateur SET nom = :nom, prenom = :prenom, password = :password, role_id =:role  WHERE username = :username");

    
    $req->bindParam(':nom',$nom, PDO::PARAM_STR);
    $req->bindParam(':prenom',$prenom, PDO::PARAM_STR);
    $req->bindParam(':password',$password, PDO::PARAM_STR);
    $req->bindParam(':role',$role, PDO::PARAM_INT);
    $req->bindParam(':username',$username, PDO::PARAM_STR);

    $request = $req->execute();
    return $request;
  }

  public function deleteUser($username) 
  { 
    $req = $this->pdo->prepare("DELETE FROM utilisateur where username = :username");
    $req->bindParam(':username',$username['username'], PDO::PARAM_STR); 
    return $req->execute();
    echo json_encode(['success' => $req]);
  }

  // Met à jour le token et sa date d'expiration
  
  
  // Vérifie si le token de réinitialisation existe dans la base de données
  
  public function findByResetToken(string $token): array
  {   
    $hashedToken = hash('sha256', $token);
    $sql = "SELECT * FROM utilisateur WHERE reset_token = :hashedToken AND reset_token_expire > NOW()";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute(['token' =>  $hashedToken]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    return $user ?: [] ;
  }
  
  public function updateResetToken($username, $token) 
  {
    
    $hashedToken = hash('sha256', $token);
    $query = "UPDATE utilisateur SET reset_token = :token, reset_token_expire = DATE_ADD(NOW(), INTERVAL 15 MINUTE) WHERE username = :username";
    $stmt = $this->pdo->prepare($query);
    $stmt->bindParam(':token',  $hashedToken);
    $stmt->bindParam(':username', $username);
    return $stmt->execute();
  }
    /**
     * Met à jour le mot de passe d'un utilisateur
     */
    public function updatePassword( $username, string $hashedPassword): bool
    {   
        $sql = "UPDATE utilisateur SET password = :password, reset_token = NULL, reset_token_expire = NULL WHERE username = :username";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            'password' => $hashedPassword,
            'username' => $username,
        ]);
    }


}
  

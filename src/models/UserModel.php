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

  public function addUser($nom, $prenom, $username, $password, $role_id)
    {
        $sql = "INSERT INTO utilisateur (nom, prenom, username, password, role_id) 
                VALUES (:nom, :prenom, :username, :password, :role_id)";

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':username' => $username,
            ':password' => $password,
            ':role_id' => $role_id
        ]);
    }

  public function getUserByUsername($username)
  {
        $query = $this->pdo->prepare('SELECT * FROM utilisateur WHERE username = ?');
        $query->execute([$username]);
        return $query->fetch(PDO::FETCH_ASSOC);
  }

  public function updateUser()
  {
    $req = $this->pdo->prepare("UPDATE utilisateur SET nom = :nom, prenom = :prenom, password = :password, role_id =:role  WHERE username = :username");

    
    $req->bindParam(':prenom',$prenom, PDO::PARAM_STR);
    $req->bindParam(':nom',$nom, PDO::PARAM_STR);
    $req->bindParam(':password',$password, PDO::PARAM_STR);
    $req->bindParam(':username',$username, PDO::PARAM_STR);
    $req->bindParam(':role',$role, PDO::PARAM_INT);

    $request = $req->execute();
  }

  public function deleteUser($username)
  {
    $req = $this->pdo->prepare("DELETE FROM animal where animal_id = :animal_id");
    $req->bindParam(':animal_id',$animal_id, PDO::PARAM_INT);
    return $req->execute();
  
  }


}
  

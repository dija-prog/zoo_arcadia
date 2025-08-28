<?php

namespace App\Models;

use App\Database;
use PDO;


class ContactModel
{
    private $pdo;
    public function __construct()
    {
        $db = new Database();
        $this->pdo = $db->getPdo();
    }
    public function addContact($titre, $email, $description)
    {
        $stmt = $this->pdo->prepare("INSERT INTO contact (titre,email,description) VALUES (?,?,?)");
        return $stmt->execute([$titre,$email,$description]);
    }
    public function showMessages()
    {   
        $stmt = $this->pdo->prepare("SELECT * FROM  contact ");
        $stmt->execute();
        $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return  $messages;
    }
}

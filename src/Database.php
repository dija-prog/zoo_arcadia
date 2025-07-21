<?php

namespace App;

use Exception;
use PDO;

class Database
{
    private $pdo;
    public function __construct()
    {
        try {
            $bdd = new PDO('mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_DATABASE'],$_ENV['DB_USERNAME'],$_ENV['DB_PASSWORD']
);
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $this->pdo = $bdd;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function getPdo() : PDO
    {
        return $this->pdo;
    }
}
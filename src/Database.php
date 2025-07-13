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
            $bdd = new PDO('mysql:host=host.docker.internal;dbname=zoo arcadia','jose_app',password: 'Jose_arcadia');
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
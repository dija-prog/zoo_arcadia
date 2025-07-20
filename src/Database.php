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
            $bdd = new PDO('mysql:host=mysql-dija.alwaysdata.net;dbname=dija_zooarcadia','dija_arcadia',password: 'zooArcadia');
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
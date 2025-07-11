<?php
// Paramètres de connexion (remplace avec TES infos AlwaysData)
$host = 'mysql-dija.alwaysdata.net;port=3306'; 
$port = 3306; 
$dbname = 'dija_zooarcadia';        
$user = 'dija_arcadia';              
$pass = 'zooArcadia';                 

try {
    // Connexion à la base avec PDO
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4", $user, $pass);

    // Activer les erreurs (mode développement)
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo " Connexion réussie."; 

} catch (PDOException $e) {
    // En cas d’erreur
    die("Erreur de connexion : " . $e->getMessage());
}
?>

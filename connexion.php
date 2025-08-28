<?php

$host =$_ENV['DB_HOST']; 
$port = $_ENV['DB_PORT']; 
$dbname = $_ENV['DB_DATABASE'];        
$user = $_ENV['DB_USERNAME'];              
$pass = $_ENV['MONGODB_PASSWORD'];                 

try {
    // Connexion à la base avec PDO
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4", $user, $pass);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo " Connexion réussie."; 

} catch (PDOException $e) {
    // En cas d’erreur
    die("Erreur de connexion : " . $e->getMessage());
}
?>

<?php


// $url =getenv('mysql://hpwdlkk6ytzu2iaz:l3mij96rgvsf75se@zy4wtsaw3sjejnud.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/qj0hr19ajswaa9v1
// ');
$url =getenv('JAWSDB_URL');
$db = parse_url($url);

// $host =$db['zy4wtsaw3sjejnud.cbetxkdyhwsb.us-east-1.rds.amazonaws.com'];
// $port =$db['3306'];
// $username = $db['hpwdlkk6ytzu2iaz'];
// $password = $db['l3mij96rgvsf75se'];
// $dbname = ltrim($db['qj0hr19ajswaa9v1'], '/');
$host =$db['host'];
$username = $db['user'];
$password = $db['pass'];
$dbname = ltrim($db['path'], '/');

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username,$password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e ) {
    die("Erreur : " . $e->getMessage());
}
?>
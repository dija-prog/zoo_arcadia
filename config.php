<?php

$url =getenv('JAWSDB_URL');
echo $url;
$db = parse_url($url);


// $host =$db['zy4wtsaw3sjejnud.cbetxkdyhwsb.us-east-1.rds.amazonaws.com'];
// $port =$db['3306'];
// $username = $db['hpwdlkk6ytzu2iaz'];
// $password = $db['l3mij96rgvsf75se'];
// $dbname = ltrim($db['qj0hr19ajswaa9v1'], '/');
$host = 'zy4wtsaw3sjejnud.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
$username = 'hpwdlkk6ytzu2iaz';
$password = 'l3mij96rgvsf75se';
$port ='3306';
$dbname = '	qj0hr19ajswaa9v1';

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4", $username,$password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e ) {
    die("Erreur : " . $e->getMessage());
}
?>
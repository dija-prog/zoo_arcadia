<?php
session_start();
if(!isset($_SESSION['username']) || $_SESSION['role'] !='2'){
    header('location:connexion.php');
    exit;
}
 echo 'Bienvenue,' . $_SESSION['username'] . "! vous êtes sur la page de employé. "
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    
</body>
</html>
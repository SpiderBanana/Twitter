<?php
$host = 'localhost';
$db   = 'projet';  // le nom de la base de données est 'projet' d'après le code SQL
$user = 'root';  // généralement l'utilisateur root est utilisé pour les installations locales de MySQL
$pass = '';  // vous devez entrer le mot de passe de l'utilisateur root ici
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$db = new PDO($dsn, $user, $pass, $opt);
?>

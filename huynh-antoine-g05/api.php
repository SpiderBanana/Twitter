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

// Vérifiez si la requête est un POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // récupérez les données du POST
    $data = json_decode(file_get_contents('php://input'), true);
    // préparez la requête SQL
    $stmt = $db->prepare('INSERT INTO table_name (pseudo, content, tag, date_heure_message, gif, image_path) VALUES (?, ?, ?, ?, ?, ?)');
    // liez les valeurs aux paramètres
    $stmt->bindValue(1, $data['pseudo']);
    $stmt->bindValue(2, $data['content']);
    $stmt->bindValue(3, $data['tag']);
    $stmt->bindValue(4, $data['date_heure_message']);
    $stmt->bindValue(5, $data['gif']);
    $stmt->bindValue(6, $data['image_path']);
    // exécutez la requête
    $stmt->execute();
}

?>

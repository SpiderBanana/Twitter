<?php
session_start();

// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=projet', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8'));

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les données du formulaire
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Vérifier si l'utilisateur existe
    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email AND password = :password');
    $stmt->execute(['email' => $email, 'password' => $password]);

    $user = $stmt->fetch();

    if ($user) {
        // Stocker le pseudo dans une variable de session
        $_SESSION['pseudo'] = $user['pseudo'];
        // Rediriger vers la page d'accueil
        header('Location: home.php');
        exit();
    } else {
        // Afficher un message d'erreur si l'utilisateur n'existe pas
        $error = 'Les informations d\'identification sont incorrectes.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
    <link rel="stylesheet" href="index_style.css">
</head>
<body>
    <div class="container">
        <h1>Connexion</h1>

        <?php if (isset($error)) : ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>

        <form method="post">
            <label for="email">E-mail :</label>
            <input type="email" name="email" id="email" required>

            <label for="password">Mot de passe :</label>
            <input type="password" name="password" id="password" required>

            <button type="submit">Se connecter</button>
        </form>
        <p>Pas encore inscrit ? <a href="index.php">S'inscrire</a></p>
    </div>
</body>
</html>

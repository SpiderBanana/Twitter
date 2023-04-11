<?php
session_start();

// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=projet', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8'));

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les données du formulaire
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Vérifier si l'utilisateur existe déjà
    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');
    $stmt->execute(['email' => $email]);

    $user = $stmt->fetch();

    if ($user) {
        // Afficher un message d'erreur si l'utilisateur existe déjà
        $error = 'Cet e-mail est déjà utilisé pour un compte existant.';
    } else {
        // Insérer l'utilisateur dans la base de données
        $stmt = $pdo->prepare('INSERT INTO users (pseudo, email, password) VALUES (:pseudo, :email, :password)');
        $stmt->execute(['pseudo' => $pseudo, 'email' => $email, 'password' => $password]);
        // Stocker le pseudo dans une variable de session
        $_SESSION['pseudo'] = $pseudo;
        // Rediriger vers la page d'accueil
        header('Location: home.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
    <link rel="stylesheet" href="index_style.css">
</head>
<body>
    <div class="container">
        <h1>Inscription</h1>

        <?php if (isset($error)) : ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>

        <form method="post">
            <label for="pseudo">Pseudo :</label>
            <input type="text" name="pseudo" id="pseudo" required>

            <label for="email">E-mail :</label>
            <input type="email" name="email" id="email" required>

            <label for="password">Mot de passe :</label>
            <input type="password" name="password" id="password" required>

            <button type="submit">S'inscrire</button>
            <!-- Add this line just below the "S'inscrire" button -->
            <p>Déjà inscrit ? <a href="login.php">Se connecter</a></p>

        </form>
    </div>
</body>
</html>

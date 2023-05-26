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
<html lang="fr">
<head>
    <title>Connexion</title>
    <!-- Importer les fichiers CSS de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index_style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <div class="register-container">
                    <h1 class="text-center welcome">Welcome</h1>
                    <h2 class="text-center sign-up">Sign in to your account</h2>
                    
                    <?php if (isset($error)) : ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>

                    <form method="post">
                        <div class="form-group">
                            <label for="email">E-mail :</label>
                            <input type="email" class="form-control" name="email" id="email" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Mot de passe :</label>
                            <input type="password" class="form-control" name="password" id="password" required>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
                    </form>

                    <div class="text-center mt-3">
                        <p>Pas encore inscrit ? <a href="index.php">S'inscrire</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<?php
session_start();

// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=projet', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

$tags = [
    '1' => 'Sport',
    '2' => 'Culture',
    '3' => 'JeuxVidéo',
    '4' => 'Histoire',
    '5' => 'Cinéma',
    '6' => 'Littérature',
    '7' => 'Tech',
    '8' => 'Musique',
    '9' => 'Animé',
    '10' => 'Sondage',
  ];
  
  // Tableau des couleurs des tags
  $tagColors = [
    '1' => '#F44336',
    '2' => '#E91E63',
    '3' => '#9C27B0',
    '4' => '#673AB7',
    '5' => '#3F51B5',
    '6' => '#2196F3',
    '7' => '#03A9F4',
    '8' => '#00BCD4',
    '9' => '#009688',
    '10' => '#4CAF50',
  ];
  

$user = isset($_GET['user']) ? $_GET['user'] : '';
if (empty($user)) {
    header('Location: home.php');
    exit;
}

function getUserProfilePicture($pdo, $pseudo) {
  $stmt = $pdo->prepare("SELECT profile_picture FROM users WHERE pseudo = :pseudo");
  $stmt->execute(['pseudo' => $pseudo]);
  $user = $stmt->fetch(PDO::FETCH_ASSOC);
  return $user ? $user['profile_picture'] : '';
}

$stmt = $pdo->prepare("SELECT * FROM posts WHERE pseudo = :pseudo ORDER BY date_heure_message DESC");
$stmt->execute(['pseudo' => $user]);
?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>projet d'axe</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500&display=swap">
  <link rel="stylesheet" href="css/home_style.css">
  <link rel="stylesheet" href="css/dark_theme.css">
  <link rel="stylesheet" href="css/button.css">
  
</head>

    <div class="page-content">
    
      
        <div class="container">
          
          
        <!-- boutton dark theme -->
        <div class="toggle-theme-container d-flex justify-content-center">
            <button id="toggle-theme" class="btn btn-primary">Passer en mode nuit</button>
            <i class="fa-solid fa-house"></i>
          </div>

        <!-- boutton de retour --> 
        <div class="container-btn">
            <a href="home.php" class="btn btn-secondary">◀️</a>
        </div>    


          
        <!-- bienvenue, --> 
          <div class="container-wrapper">
      <div class="welcome-container">
        <?php if (isset($_SESSION['pseudo'])) : ?>
          <img src="<?php echo (htmlspecialchars(getUserProfilePicture($pdo, $_SESSION['pseudo']))) . '?t=' . time(); ?>" alt="Profile Picture" class="profile-picture" />

          <h1 class="my-4 welcome-message">Bienvenue, <?php echo htmlspecialchars($_SESSION['pseudo']); ?></h1>
        <?php else : ?>
          <h1 class="my-4 welcome-message">Bienvenue</h1>
        <?php endif; ?>
      </div>
 </div>

   <!-- Affichage "Posts" -->
   <h2 class="my-4 centered">Posts de <?php echo htmlspecialchars($user);?></h2>

 
        
                <?php
      // parcourt tous les posts récupérés de la base de données et les affiche sur la page
      while ($post = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<div class="post-container d-flex">';
    
        // Afficher la photo de profil en haut à gauche avec le lien vers le profil
        $userProfilePicture = getUserProfilePicture($pdo, $post['pseudo']);
        if (empty($userProfilePicture)) {
            $userProfilePicture = 'default_profile_picture.png';
        }
        echo '<a href="profile.php?user=' . htmlspecialchars($post['pseudo']) . '">';
        echo '<div class="post-profile-picture">';
        echo '<img src="' . htmlspecialchars($userProfilePicture) . '" alt="Profile Picture" class="profile-picture" />';
        echo '</div>';
        echo '</a>';
    
        // Afficher le pseudo avec la date et heure juste en dessous
        echo '<div class="post-content-container">';
        echo '<strong class="post-username">' . $post['pseudo'] . ' <span style="color: ' . $tagColors[$post['tag']] . '">[' . $tags[$post['tag']] . ']</span></strong>';
        echo '<div class="post-info d-flex">';
        echo '<small>Date et heure: ' . date('d-m-Y H:i:s', strtotime($post['date_heure_message'])) . '</small>';
        echo '</div>';
        
        // Afficher le contenu du post
        echo '<p class="post-content" style="word-wrap: break-word;">' . $post['content'] . '</p>';
        
        // Afficher l'image du post s'il y en a une
        if (!empty($post['image_path'])) {
          echo '<div class="post-image">';
          echo '<img src="' . htmlspecialchars($post['image_path']) . '" alt="Post Image" />';
          echo '</div>';
        }
        
        echo '</div>';
        
        // bouton supprimer
        echo '<div class="post-delete-button">';
        if (isset($_SESSION['pseudo']) && $_SESSION['pseudo'] == $post['pseudo']) {
          echo '<form method="post" style="display: inline;">';
          echo '<input type="hidden" name="post_id" value="' . $post['id'] . '">';
          echo '<button type="submit" class="btn btn-danger btn-sm" name="delete_post" onclick="return confirmDelete();">&#128465</button>';
          echo '</form>';
        }
        
        echo '</div>';
        
        echo '</div>';
    }
    
      ?>
</body>
</html>


<script src="script.js"></script>


        
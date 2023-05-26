<?php
session_start();

// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=projet', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// Tableau des tags
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

// Si le bouton suppression est cliqué
if (isset($_POST['delete_post']) && isset($_POST['post_id'])) {
    $post_id = $_POST['post_id'];

    // Supprimer le post de la base de données
    $stmt = $pdo->prepare("DELETE FROM posts WHERE id = :post_id");
    $stmt->execute(['post_id' => $post_id]);
}

// Si le bouton de tri a été cliqué
if (isset($_GET['sort']) && ($_GET['sort'] == 'recent' || $_GET['sort'] == 'ancien')) {
    $order = ($_GET['sort'] == 'recent') ? 'DESC' : 'ASC';
} else {
    $order = 'DESC';
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['content']) && isset($_POST['tag'])) {
  // Récupérer les données du formulaire
  $content = $_POST['content'];
  $tag = $_POST['tag'];

  // Traiter l'image téléchargée
  $image_path = '';
  if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Autoriser seulement certains formats d'image
    if ($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif") {
      // Déplacez le fichier téléchargé vers le dossier des uploads
      if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $image_path = $target_file;
      }
    }
  }

  // Insérer le post dans la base de données
  $stmt = $pdo->prepare("INSERT INTO posts (pseudo, content, tag, date_heure_message, image_path) VALUES (:pseudo, :content, :tag, NOW(), :image_path)");
  $stmt->execute(['pseudo' => $_SESSION['pseudo'], 'content' => $content, 'tag' => $tag, 'image_path' => $image_path]);
}

// Recherche de posts
$search = isset($_GET['search']) ? '%' . $_GET['search'] . '%' : '%';
$tag = isset($_GET['tag']) ? $_GET['tag'] : '';

if (!empty($tag)) {
  $stmt = $pdo->prepare('SELECT * FROM posts WHERE content LIKE :search AND tag = :tag ORDER BY date_heure_message ' . $order);
  $stmt->execute(['search' => $search, 'tag' => $tag]);
} else {
  $stmt = $pdo->prepare('SELECT * FROM posts WHERE content LIKE :search ORDER BY date_heure_message ' . $order);
  $stmt->execute(['search' => $search]);
}

// Changer la photo de profil
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['profile_picture'])) {
  $response = ['success' => false, 'profile_picture' => ''];
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["profile_picture"]["name"]);
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  // Vérifiez si le fichier est une image
  $check = getimagesize($_FILES["profile_picture"]["tmp_name"]);
  if ($check !== false) {
    // Autoriser seulement certains formats d'image
    if ($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif") {
      // Déplacez le fichier téléchargé vers le dossier des uploads
      if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
        // Mettre à jour le chemin de l'image de profil dans la base de données
        $stmt = $pdo->prepare("UPDATE users SET profile_picture = :profile_picture WHERE pseudo = :pseudo");
        $stmt->execute(['profile_picture' => $target_file, 'pseudo' => $_SESSION['pseudo']]);
        $_SESSION['profile_picture'] = $target_file;
        $response['success'] = true;
        $response['profile_picture'] = $target_file;
        
        // Redirect vers la même page
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
      }
    }
  }
}


// Fonction pour récupérer la photo de profil de l'utilisateur
function getUserProfilePicture($pdo, $pseudo) {
  $stmt = $pdo->prepare("SELECT profile_picture FROM users WHERE pseudo = :pseudo");
  $stmt->execute(['pseudo' => $pseudo]);
  $user = $stmt->fetch(PDO::FETCH_ASSOC);
  return $user ? $user['profile_picture'] : 'uploads/default_profile_picture.png';
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>projet d'axe</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500&display=swap">
  <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" href="css/home_style.css">
  <link rel="stylesheet" href="css/dark_theme.css">
  <link rel="stylesheet" href="css/button.css">
</head>
<body>
  <main class="page-content">
    <section class="container">
      <!-- boutton dark theme -->
      <div class="toggle-theme-container d-flex justify-content-center">
        <button id="toggle-theme" class="btn btn-primary">Passer en mode nuit</button>
        <i class="fa-solid fa-house"></i>
      </div>
      <!-- boutton deconnexion --> 
      <div class="container-btn">
        <form method="post" action="logout.php" class="logout-form">
          <button id="logout-button" type="submit" class="btn btn-secondary">&#128682;</button>
        </form>
        <!-- boutton choisir photo de profil --> 
        <div class="settings-container">
          <button id="settings-btn" class="btn btn-secondary">&#9881;</button>
        </div>
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
      <!-- Affichage grille des TAGS -->
      <h2 class="my-4 centered">TAGS</h2>
      <div class="tweets-container">
        <div class="tags-grid">
          <?php foreach ($tags as $key => $value) : ?>
            <button class="tag-button" data-tag="<?php echo $key; ?>" style="background-color: <?php echo $tagColors[$key]; ?>;"><?php echo $value; ?></button>
          <?php endforeach; ?>
        </div>
        <!-- Barre de recherche -->
        <form method="get" class="search-form" id="search-form">
          <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Rechercher un post" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
            <div class="input-group-append">
              <!-- Bouton rechercher -->
              <button type="submit" class="btn btn-primary">Rechercher</button>
              <!-- Bouton réinitialiser -->
              <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="btn btn-secondary">Réinitialiser</a>
            </div>
          </div>
        </form>
      </div>
      <!-- tri des posts -->
      <div class="tri">    
        <a href="?sort=ancien">Du plus ancien au plus récent</a> | <a href="?sort=recent">Du plus récent au plus ancien</a>
      </div> 

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

      <!-- boutton pour poster -->
      <div class="floating-btn-container">
        <button id="floating-btn" class="floating-btn d-none d-md-inline-block">&#9999;</button>
      </div>

      <!-- modal pour poster -->
      <div id="modal" class="modal">
        <div class="modal-content">
          <span class="close">&times;</span>
          <form method="post" class="post-form" enctype="multipart/form-data">
            <div class="form-group">
              <label for="content">Nouveau post :</label>
              <textarea name="content" id="message-input" class="form-control" rows="5" required placeholder="Quoi de neuf ?" oninput="saveMessage();"></textarea>
              <div class="form-group">
                <input type="file" name="image" id="image" class="form-control-file">
              </div>
              <label for="tag">Tag:</label>
              <select name="tag" id="tag-select" class="form-control" onchange="saveTag();">
                <?php foreach ($tags as $key => $value) : ?>
                  <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <button id="publish-btn" type="submit" class="btn btn-primary" onclick="resetLocalStorage()">Poster</button>
          </form>
        </div>
      </div>
    </section>

    <!-- modal pour choisir une photo de profil -->
    <section id="settings-modal" class="modal">
      <div class="modal-content">
        <span class="close">&times;</span>
        <form method="post" enctype="multipart/form-data" class="profile-picture-form" id="profile-picture-form">
          <div class="form-group">
            <label for="profile_picture">Choisir une photo de profil :</label>
            <div class="form-group">
              <input type="file" name="profile_picture" id="profile_picture" class="form-control-file" accept="image/*" required>
            </div>
            <small class="form-text text-muted">Formats acceptés : JPG, JPEG, PNG et GIF.</small>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Enregistrer</button>
          </div>
        </form>
      </div>
    </section>
  </main>

  <!-- page flouté -->
  <div id="loginModal" class="modal">
    <div class="modal-content">
      <p>Veuillez vous connecter.</p>
      <a href="login.php" class="btn btn-primary">Connexion</a>
    </div>
  </div>

  <!-- Navbar mobile -->
  <nav id="navbar-bottom" class="navbar-bottom">
    <button id="hamburger" class="hamburger">&#9776;</button> <!-- Bouton hamburger -->
    <div id="dropdown" class="dropdown"> <!-- Menu déroulant -->
      <a href="#" id="post-link" class="dropdown-item">Poster</a>
      <a href="#" id="choose-picture-link" class="dropdown-item">Choisir une photo de profil</a>
      <a href="logout.php" class="dropdown-item">Déconnexion</a>
    </div>
  </nav>
</body>
</html>



<script src="javascript/script.js"></script>
<script src="javascript/navbar.js"></script>


<script>
function isLoggedIn() {
  // Vérifiez si l'utilisateur est connecté
  <?php if (isset($_SESSION['pseudo'])): ?>
    return true;
  <?php else: ?>
    return false;
  <?php endif; ?>
}
</script>



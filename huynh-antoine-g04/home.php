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


// Gérer la suppression des posts
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
          }
      }
  }
}

function getUserProfilePicture($pdo, $pseudo) {
  $stmt = $pdo->prepare("SELECT profile_picture FROM users WHERE pseudo = :pseudo");
  $stmt->execute(['pseudo' => $pseudo]);
  $user = $stmt->fetch(PDO::FETCH_ASSOC);
  return $user ? $user['profile_picture'] : '';
}



?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>projet d'axe</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> <!--importation Bootstrap-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> <!--importation jquery-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> <!--importation ajax-->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> <!--importation Bootstrap-->
  <link rel="stylesheet" href="css/home_style.css">
  <link rel="stylesheet" href="css/dark_theme.css">
  <link rel="stylesheet" href="css/button.css">
  <script src="https://kit.fontawesome.com/e1f27ad912.js" crossorigin="anonymous"></script>
  
</head>

    <div class="page-content">
    
      
        <div class="container">
          
          
        <!-- boutton dark theme -->
        <div class="toggle-theme-container d-flex justify-content-center">
            <button id="toggle-theme" class="btn btn-primary">Passer en mode nuit</button>
            <i class="fa-solid fa-house"></i>
          </div>
        <!-- boutton deconnexion --> 
        <div class="container-btn">
            <form method="post" action="logout.php" class="logout-form">
              <button type="submit" class="btn btn-secondary">	&#128682;</button>
            </form>
        <!-- boutton choisir photo de profil --> 
        <div class="settings-container">
            <button id="settings-btn" class="btn btn-secondary d-none d-md-inline-block">&#9881;</button>
        </div>
          </div>
        <!-- bienvenue, --> 
          <div class="container-wrapper">
      <div class="welcome-container">
        <?php if (isset($_SESSION['pseudo'])) : ?>
          <img src="<?php echo (htmlspecialchars(getUserProfilePicture($pdo, $_SESSION['pseudo'])) ?: 'default_profile_picture.png') . '?t=' . time(); ?>" alt="Profile Picture" class="profile-picture" />
          <h1 class="my-4 welcome-message">Bienvenue, <?php echo htmlspecialchars($_SESSION['pseudo']); ?></h1>
        <?php else : ?>
          <h1 class="my-4 welcome-message">Bienvenue</h1>
        <?php endif; ?>
      </div>
 </div>


          <!-- Affichage "Posts" -->
      <h2 class="my-4 centered">Posts</h2>

      <div class="tweets-container">
          <form method="get" class="search-form mb-3" id="search-form">

        <div class="input-group">
          
          <input type="text" name="search" class="form-control d-none d-md-inline-block" placeholder="Rechercher un post" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
          <!-- Ajout du champ de sélection pour le tag dans le formulaire de recherche -->
          <select name="tag" class="form-control">
            <option value="">Tous les tags</option>
            <?php foreach ($tags as $key => $value) : ?>
              <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
            <?php endforeach; ?>
          </select>

          <div class="input-group-append">
            <button type="submit" class="btn btn-primary">Rechercher</button>
            <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="btn btn-secondary">Réinitialiser</a>
          </div>
        </div>
      </form>

      <form method="get" class="search-form d-none" id="mobile-search-form">
        <div class="input-group ">
          <input type="text" name="search" class="form-control d-md-none"  placeholder="Rechercher un post" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
          
        </div>
      </form>


          </div>
          
          <ul class="list-group">

                      <!--tri les tweets affichés en fonction de la date de publication (code php au-dessus).-->
                      <div class="sort-links">
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
          </ul>

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
          <select name="tag" id="tag-select" class="form-control"onchange="saveTag();">
            <?php foreach ($tags as $key => $value) : ?>
              <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
            <?php endforeach; ?>
          </select>

        </div>
        <button type="submit" class="btn btn-primary">Poster</button>
      </form>

      </div>
        </div>
      </div>

      <!-- modal pour choisir une photo de profil -->
      <div id="settings-modal" class="modal">
        <div class="modal-content">
          <span class="close">&times;</span>
          <form method="post" enctype="multipart/form-data" class="profile-picture-form">
            <div class="form-group">
              <label for="profile_picture">Choisir une photo de profil :</label>
              
              <div class="file-upload">
        <input type="file" name="profile_picture" id="profile_picture" class="file-input" accept="image/*" required>
        <label for="profile_picture" class="file-label">
          <i class="fa fa-upload"></i> Choisissez un fichier
        </label>
        <span class="file-name"></span>
      </div>

              <small class="form-text text-muted">Formats acceptés : JPG, JPEG, PNG et GIF.</small>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Enregistrer</button>
            
            </div>
          </form>
        </div>
      </div>
    </div>
</div>

<!-- page flouté -->
<div id="loginModal" class="modal">
  <div class="modal-content">
    <p>Veuillez vous connecter.</p>
    <a href="login.php" class="btn btn-primary">Connexion</a>
  </div>
</div>



<!-- navbar responsive -->
<div class="navbar fixed-bottom d-md-none">
  <div class="container">
    <div class="d-flex justify-content-around">
      <button id="hamburger" class="hamburger">&#9776;</button>
    </div>
  </div>
</div>

<div id="dropdown-menu" class="floating-menu d-md-none">
  <a data-action="settings-link">&#9881;</a>
  <a data-action="search-link">🔎</a>
  <a data-action="new-post-link">&#9999;</a>
</div>


</body>
</html>


<script src="script.js"></script>

<script>$(document).ready(function () {
  // Ouvrir/Fermer le menu déroulant flottant lorsqu'on clique sur le bouton hamburger
  $('#hamburger').on('click', function () {
    $('#dropdown-menu').toggleClass('open');
  });
});

//JQUERY
$(document).ready(function() {
  // Ouvrir le modal pour choisir une photo de profil
  $('#dropdown-menu a[data-action="settings-link"], #settings-btn').click(function() {
    $('#settings-modal').show();
  });

  // Ouvrir le modal pour poster
  $('#dropdown-menu a[data-action="new-post-link"], #floating-btn').click(function() {
    $('#modal').show();
  });

  // Afficher la barre de recherche mobile
  $('#dropdown-menu a[data-action="search-link"], #search-link').click(function() {
    $('#mobile-search-form').toggleClass('d-none');
  });

  // Fermer les modals
  $('.modal .close').click(function() {
    $(this).closest('.modal').hide();
  });

  // Fermer les modals lorsqu'on clique en dehors de la zone de contenu
  $('.modal').click(function(e) {
    if (e.target == this) {
      $(this).hide();
    }
  });
});
</script>



<script>
function isLoggedIn() {
  // Vérifiez si l'utilisateur est connecté
  <?php if (isset($_SESSION['pseudo'])): ?>
    return true;
  <?php else: ?>
    return false;
  <?php endif; ?>
}

function showModal() {
  if (!isLoggedIn()) {
    document.getElementById('loginModal').style.display = 'block';
    document.body.classList.add('blur');
    document.querySelector('.page-content').classList.add('blur');
    document.getElementById('loginModal').style.display = 'block';
  }
}

// Ajoutez des écouteurs d'événements pour le bouton de changement de photo de profil et le bouton d'ouverture du modal de post
document.getElementById('settings-btn').addEventListener('click', showModal);
document.getElementById('floating-btn').addEventListener('click', showModal);

// Ajoutez un écouteur d'événements pour détecter le défilement de la page
window.addEventListener('scroll', function() {
  setTimeout(function() {
    showModal();
  }, 1000);
});

function removeBlur() {
  document.body.classList.remove('blur');
  document.querySelector('.page-content').classList.remove('blur');
}


// Ajoutez un écouteur d'événement pour détecter la fermeture du modal
document.getElementById('loginModal').addEventListener('click', function(event) {
  if (event.target.id === 'loginModal') {
    document.body.classList.remove('blur');
    document.querySelector('.page-content').classList.remove('blur');
    document.getElementById('loginModal').style.display = 'none';
  }
});


</script>


<!DOCTYPE html>
<html>
<head>
  <title>Téléchargement d'image</title>
</head>
<body>
  <form action="save_image.php" method="post" enctype="multipart/form-data">
    <input type="file" name="image">
    <input type="submit" value="Envoyer">
  </form>
</body>
</html>

<?php
  // Récupération des données du formulaire
  $image = $_FILES['image']['name'];

  // Définir le chemin de stockage de l'image
  $target = "images/".basename($image);

  // Enregistrement de l'image sur le serveur
  if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
    echo "L'image ". $image. " a été téléchargée avec succès.";
  } else {
    echo "Erreur lors du téléchargement de l'image.";
  }

  // Connexion à la base de données
  $pdo = new PDO('mysql:host=localhost;dbname=projet', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

  // Préparation de la requête SQL
  $sql = "INSERT INTO images (image_path) VALUES (:image_path)";
  $stmt = $pdo->prepare($sql);

  // Liaison des valeurs
  $stmt->bindValue(':image_path', $target, PDO::PARAM_STR);

  // Exécution de la requête
  $stmt->execute();

  // Vérification de l'exécution de la requête
  if ($stmt->rowCount() > 0) {
    echo "L'image a été enregistrée dans la base de données.";
  } else {
    echo "Erreur lors de l'enregistrement de l'image dans la base de données.";
  }
?>

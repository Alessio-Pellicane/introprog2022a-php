<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Formulaires: super-héros</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="assets/css/main.css" />
</head>
<body>
  <h1>Formulaires: super-héros!</h1>

  <form action="#" method="post" enctype="multipart/form-data">
    <fieldset>
    <legend>Ajoute un super-héros !</legend>
    <div>
      <label for="nom">Nom du héros :</label>
      <input type="text" name="nom" required>
    </div>
    <div>
      <label for="fileToUpload">Image du héros :</label>
      <input type="file" name="fileToUpload" id="fileToUpload">
    </div>
    <input type="submit" value="Upload Image" name="submit">
    </fieldset>
  </form>

  <?php
    // Déclaration des variables
    $charactersList = array("Spiderman" => "spiderman.jpg", "Batman" => "batman.jpg");
    $charName = "";
    $charUrl = "";

    // Fonction pour générer un string aléatoire afin de ne pas avoir deux fois le même nom d'image
    function randomString($lenght = 10) {
      // ceil — Arrondit au nombre supérieur
      // substr — Retourne un segment de chaîne
      // str_shuffle — Mélange les caractères d'une chaîne de caractères
      // str_repeat — Répète une chaîne
      return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($lenght/strlen($x)) )),1,$lenght);
    }

    // Soumission du formulaire
    if(isset($_POST["submit"])) {
      $target_dir = "uploads/";
      $randomString = randomString();
      // Nom du chemin vers l'image avec en ajout une string aléatoire
      $target_file = $target_dir . $randomString . "-" .basename($_FILES["fileToUpload"]["name"]);
      $charName = $_POST["nom"];
      $charUrl = $randomString . "-" .basename($_FILES["fileToUpload"]["name"]);
      // var_dump($charName . " - " . $charUrl);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      // Vérifie si le fichier image est une image réelle ou une fausse image
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
        echo "Le fichier est une image - " . $check["mime"] . ".<br>";
        $uploadOk = 1;
      } else {
        echo "Le fichier n'est pas une image.<br>";
        $uploadOk = 0;
      }

      // Vérifie si le fichier existe déjà
      if (file_exists($target_file)) {
        echo "Désolé, le fichier existe déjà.<br>";
        $uploadOk = 0;
      }

      // Vérifie la taille du fichier
      if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Désolé, votre fichier est trop volumineux.<br>";
        $uploadOk = 0;
      }

      // Autorise certains formats de fichiers
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
        echo "Désolé, seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés.<br>";
        $uploadOk = 0;
      }

      if ($uploadOk == 0) {
        // Vérifie si $uploadOk est défini sur 0 à cause d'une erreur
        echo "Désolé, votre fichier n'a pas été uploadé.<br>";
        // si tout va bien, on essaye d'uploader le fichier
      } else {
        // move_uploaded_file — Déplace un fichier téléchargé
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          echo "Le fichier ". htmlspecialchars( $randomString . "-" . basename( $_FILES["fileToUpload"]["name"])). " a été uploadé.<br>";
          // Ajout du nouveau personnage dans le tableau
          var_dump("Ancien tableau : " . json_encode($charactersList). "<br>");
          $charactersList += [$charName => $charUrl];
          var_dump("Nouveau tableau : " . json_encode($charactersList). "<br>");
          $charName = "";
          $charUrl = "";
        } else {
          echo "Désolé, une erreur s'est produite lors du téléchargement de votre fichier.<br>";
        }
      }
    }

    // On liste les personnages
    function listCharacters ($charactersList) {
      echo "<h2>Liste des super héros : </h2>";
      echo "<section class=\"gallery-grid\">";
      foreach($charactersList as $key => $value){
        echo "<figure  class=\"gallery-frame\">";
          echo "<div class=\"gallery-img\"><img src=\"uploads/" . $value . "\" alt=\"" . $key . "\"></div>";
          echo "<figcaption>" . $key . "</figcaption>";
        echo "</figure >";
      }
      echo "</section>";
    }
    listCharacters ($charactersList);
  ?>

  <script>
    if ( window.history.replaceState ) {
      window.history.replaceState( null, null, window.location.href );
    }
  </script>

</body>
</html>
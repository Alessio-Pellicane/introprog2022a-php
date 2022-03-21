<?php
  // Import du tableau
  require_once("php/array-fellowship.php");
  // Import du Header
  include("common/header.php");
?>

<!-- Main content -->
<?php

  // Lister chaque personnage et créer sa carte
  function listCharacters ($fellowshipList) {
    echo "<section class=\"gallery-grid\">";
    foreach($fellowshipList as $key => $value){
        /* Création du template de la carte du personnage */
        echo "<figure class=\"gallery-frame bkgr-default\">";
        echo "<h2>" . $value["nom"] . "</h2>";
        echo "<h3>" . $value["origine"] . " - " . $value["age"] . " ans</h2>";
        echo "<div class=\"gallery-img\"><img src=\"assets/img/" . $value["url-img"]  . "\" alt=\"" . $value["nom"] . "\"></div>";
        echo "<div class=\"quote\">" . $value["citation"] . "</div>";
        echo "</figure >";
      }
    echo "</section>";
  }
  listCharacters ($fellowshipList);
?>

<?php
  // Import du Footer
  include("common/footer.php");
?>
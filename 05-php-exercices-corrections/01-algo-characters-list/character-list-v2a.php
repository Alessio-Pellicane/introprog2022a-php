<?php
  // Import du tableau
  require_once("php/array-fellowship.php");
  // Import du Header
  include("common/header.php");
?>

<!-- Main content -->
<?php

  // Trier le tableau pour afficher les personnages par âge
  $arrayByAge = array();
  foreach ($fellowshipList as $key => $value)
  {
    $arrayByAge[$key] = $value['age'];
  }
  array_multisort($arrayByAge, SORT_ASC, $fellowshipList);
  // var_dump($fellowshipList);

  // Lister chaque personnage et créer sa carte
  function listCharacters ($fellowshipList) {
    $borderColor = "bkgr-default"; // utilisé pour définir le background en fonction de l'origine
    echo "<section class=\"gallery-grid\">";
    foreach($fellowshipList as $key => $value){
      if (is_array($value)) {
        if ($value["origine"] === "Elfe") {
          $borderColor  = "bkgr-green";
        }
        else if ($value["origine"] === "Hobbit") {
          $borderColor  = "bkgr-brown";
        }
        else if ($value["origine"] === "Humain") {
          $borderColor  = "bkgr-red";
        }
        else if ($value["origine"] === "Nain") {
          $borderColor  = "bkgr-grey";
        }
        else if ($value["origine"] === "Maiar") {
          $borderColor  = "bkgr-blue";
        }
        else {
          $borderColor = "bkgr-default";
        }
        /* Création du template de la carte du personnage */
        echo "<figure class=\"gallery-frame " . $borderColor . "\">";
        echo "<h2>" . $value["nom"] . "</h2>";
        echo "<h3>" . $value["origine"] . " - " . $value["age"] . " ans</h2>";
        echo "<div class=\"gallery-img\"><img src=\"assets/img/" . $value["url-img"]  . "\" alt=\"" . $value["nom"] . "\"></div>";
        echo "<div class=\"quote\">" . $value["citation"] . "</div>";
        echo "</figure >";
      }
    }
    echo "</section>";
  }
  listCharacters ($fellowshipList);
?>

<?php
  // Import du Footer
  include("common/footer.php");
?>
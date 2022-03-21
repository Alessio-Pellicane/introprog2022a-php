<h1>FONCTIONS</h1>

<?php

  // FONCTIONS

  $name1 = "Aragorn";
  $name2 = "Gandalf";
  $name3 = "Frodon";

  // Exemple 1: variables globales

  function displayNames () {
    global $name1, $name2, $name3;
    echo "Hello " . $name1 . "," . $name2 . "," .$name3;
  }
  displayNames();

  // Exemple 2 : variables globales passées en argument
  // arguments ( = paramètres) passés dans l'appel de fonction
  // récupérés dans l'appel de fonction
  function displayNames2 ($param1, $param2, $param3) {
    echo "<br />";
    echo "Hello " . $param1 . "," . $param2 . "," .$param3;
  }
  displayNames2($name1, $name2, $name3);

  // Exemple 3 : variables locales
  function displayNames3 () {
    $name1 = "Boromir";
    $name2 = "Sam";
    $name3 = "Arwen";
    echo "<br />";
    echo "Hello " . $name1 . "," . $name2 . "," .$name3;
  }
  displayNames3();
?>
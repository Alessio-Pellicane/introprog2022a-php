<h1>VARIABLES (Array / Tableaux multidimensionnels)</h1>

<?php

  /*
    Un tableau multidimensionnel est un tableau qui va lui-même contenir d’autres tableaux en valeurs.
  */

  // Tableaux avec des personnages (nom, age, booléen)

  $character0 = [
    "name" => "Aragorn",
    "age" => 87,
    "isHobbit" => false
  ];

  $character1 = [
    "Gandalf",
    9000,
    false
  ];

  $character2 = [
    "name" => "Frodon",
    "age" => 37,
    "isHobbit" => true
  ];

  // Tableaux contenant tous les personnages

  $charactersList = array( $character0, $character1, $character2);
  echo "L'age d'Aragorn: " . $charactersList[0]["age"];
  echo "<br />";
  echo "L'age de Gandalf: " . $charactersList[1][1];
  echo "<br />";
  echo "L'age de " . $charactersList[2]["name"] . ": " . $charactersList[2]["age"];
  echo "<br />";

?>
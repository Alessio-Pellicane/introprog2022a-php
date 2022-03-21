<h1>VARIABLES (Array / Tableaux)</h1>

<?php

  /*
    Un tableau / array stocke plusieurs valeurs dans une seule variable.
    L'index ( = position dans le tableau) commence à zéro.
    On cible une valeur en utilisant le nom du tableau et en mentionnant sa position
    entre crochets: [i]
  */

  $characters = array("Aragorn", "Legolas", "Gandalf"); // indexation automatique
  // echo implode(",", $characters); // lister le tableau au format string
  // echo count($characters); // compter le nombre d'items dans le tableau
  // echo "Hello " . $characters[0] . ", " . $characters[1] . " et " . $characters[2] . ".";

  $characters[3] = "Gimli"; // indexation manuelle
  // echo implode(",", $characters); // lister le tableau au format string

  $characterSpec = array("Frodon", 33, true);
  // echo "<br />";
  echo implode("", $characterSpec);

?>
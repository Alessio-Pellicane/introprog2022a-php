<h1>TYPES DE VARIABLES</h1>

<?php
  // TYPES DE VARIABLES

  // déclaration et assignation de variable
  $name = "Yoda";
  $age = 600;
  $age2 = "10";
  // incrémentation de variable
  $age = $age + 1;
  // affichage
  // echo $name . " a " . $age . " ans";
  // echo "<br />";
  // mélange de types
  // echo $name + $name; // non-numeric value
  // echo $age + $age2; // 94
  // echo $name + $age; // non-numeric value
  // echo 10 + $age2; // 20

  $newVar = 10 + "10";
  echo gettype($newVar);
?>
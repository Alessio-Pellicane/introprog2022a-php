<h1>SWITCH CASE</h1>

<?php

  // SWITCH CASE
  /*
    L’instruction switch va permettre d’exécuter un code en fonction de la valeur
    d’une variable. On va pouvoir gérer autant de situations ou de "cas" que l’on souhaite.
  */

  $character = "Frodon";
  // $character = "Gimli";
  // $character = "Legolas";
  // $character = "Gandalf";

  switch($character) {
    case "Frodon":
      echo "$character est un hobbit";
      break;
    case "Gimli":
      echo "$character est un nain";
      break;
    case "Legolas":
      echo "$character est un elfe";
      break;
    default:
      echo "$character n'est ni un hobbit, ni un nain, ni un elfe";
  }

  /*
    Lorsque la condition est rencontrée, l'exécution du switch s'arrête (break)
  */
?>
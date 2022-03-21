<h1>CONDITIONELLES (If... else if... else...)</h1>

<?php

  // CONDITIONELLES (IF)

  // $character = "Frodon";
  $character = "Gimli";
  // $character = "Legolas";
  // $character = "Gandalf";

  function displayCharacterType ($character) {
    // Conditionnelle = boolean
    if ($character === "Frodon") {
      echo "$character est un hobbit";
    } else if ($character === "Gimli") {
      echo "$character est un nain";
    } else if ($character === "Legolas") {
      echo "$character est un elfe";
    } else {
      echo "$character n'est ni un hobbit, ni un nain, ni un elfe";
    }
  }
  displayCharacterType ($character);

  /*
    Toutes les conditions sont exécutées
  */
?>
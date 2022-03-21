<h1>VARIABLES (Array / Tableaux): Tri</h1>

<?php

  /*
    PHP propose des fonctions pour trier les tableaux
      sort() - trie les tableaux par ordre croissant
      rsort() - trie les tableaux par ordre décroissant
  */

  $fellowshipMembers = array("Frodon", "Merry", "Sam", "Pippin", "Aragorn", "Boromir", "Gimli", "Legolas", "Gandalf");

  sort($fellowshipMembers);
  // rsort($fellowshipMembers);
  // var_dump($fellowshipMembers); // var_dump affiche le contenu d'une variable (debug)

  echo "<br />";
  /*
    PHP propose des fonctions pour trier les tableaux associatifs
      asort() – trie les tableaux associatifs par ordre croissant, selon la valeur
      ksort() – trie les tableaux associatifs par ordre croissant, selon la clé
      arsort() – trie les tableaux associatifs par ordre décroissant, selon la valeur
      krsort() – trie les tableaux associatifs par ordre décroissant, selon la clé
  */

  $charactersAge = array("Gandalf" => "9000", "Aragorn" => "87", "Legolas" => "2931");
  asort($charactersAge);
  // ksort($charactersAge);
  // arsort($charactersAge);
  // krsort($charactersAge);
  var_dump($charactersAge);
?>
<h1>LOOP / BOUCLE: WHILE</h1>

<?php

  // LOOP / BOUCLE: WHILE (TANT QUE)

  // Tant que la condition n'est pas remplie, on exécute la boucle (test puis action)

  // Compteur de 1 à 10
  /*
    Pour une valeur commençant à 1
    Tant que cette valeur est plus petite ou égale à 10
    J'exécute le code et incrémente de 1
  */

  function counterFct () {
    $i = 1;
    while ($i <= 10) {
      echo "Compteur: " . $i;
      echo "<br />";
      $i++;
    }
  }
  counterFct ();


  // Lister le contenu d'un tableau

  /*
    Pour un tableau donné commençant à 0
    Tant que je n'ai pas parcouru tout le tableau
    J'exécute le code et incrémente de 1
  */

  function fellowshipNames () {
    $fellowshipMembers = array("Frodon", "Merry", "Sam", "Pippin", "Aragorn", "Boromir", "Gimli", "Legolas", "Gandalf");
    $i = 0;
    echo "<br />";
    echo "Liste des membres de la Communauté de l'anneau:";
    echo "<br />";
    while ($i < count($fellowshipMembers)) {
      echo "- " . $fellowshipMembers[$i];
      echo "<br />";
      $i++;
    }
  }
  // fellowshipNames ();
?>
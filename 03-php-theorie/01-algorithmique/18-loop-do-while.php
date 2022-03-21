<h1>LOOP / BOUCLE: DO WHILE</h1>

<?php

  // LOOP / BOUCLE DO WHILE (FAIS TANT QUE)

  // On exécute la boucle, tant que la condition n'est pas remplie (action puis test)

  // Compteur de 1 à 10
  /*
    Pour une valeur commençant à 1
    Tant que cette valeur est plus petite ou égale à 10
    J'incrémente de 1
  */
  function counterFct () {
    $i = 1;
    do {
      echo "Compteur: " . $i;
      echo "<br />";
      $i++;
    }
    while ($i <= 10);
  }
  counterFct ();


  // Lister le contenu d'un tableau
  /*
    Pour un tableau donné commençant à 0
    J'exécute le code et incrémente de 1
    Tant que je n'ai pas parcouru tout le tableau
  */

  function fellowshipNames () {
    $fellowshipMembers = array("Frodon", "Merry", "Sam", "Pippin", "Aragorn", "Boromir", "Gimli", "Legolas", "Gandalf");
    $i = 0;
    echo "<br />";
    echo "Liste des membres de la Communauté de l'anneau:";
    echo "<br />";
    do {
      echo "- " . $fellowshipMembers[$i];
      echo "<br />";
      $i++;
    }
    while ($i < count($fellowshipMembers));
  }
  fellowshipNames ();
?>
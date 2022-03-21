<h1>LOOP / BOUCLE: FOR</h1>

<?php

  // LOOP / BOUCLE FOR (POUR)

  // Initialisation / Condition / Incrémentation (=Augmentation de la valeur d'une variable)

  // Compteur de 1 à 10
  /*
    Pour une valeur commençant à 1
    Si cette valeur est plus petite ou égale à 10
    J'exécute le code et incrémente de 1
  */
  function counterFct () {
    for ($i = 1; $i <=10; $i++) {
      echo "Compteur: " . $i;
      echo "<br />";
    }
  }
  // counterFct ();


  // Lister le contenu d'un tableau
  /*
    Pour un tableau donné commençant à 0
    Si je n'ai pas parcouru tout le tableau (opérateur de comparaison)
    J'exécute le code et incrémente de 1
  */

  function fellowshipNames () {
    $fellowshipMembers = array("Frodon", "Merry", "Sam", "Pippin", "Aragorn", "Boromir", "Gimli", "Legolas", "Gandalf");
    // echo count($fellowshipMembers); // compter le nombre d'éléments d'un tableau
    echo "<br />";
    echo "Liste des membres de la Communauté de l'anneau:";
    echo "<br />";
    for ($i = 0; $i < count($fellowshipMembers); $i++) {
      echo "- " . $fellowshipMembers[$i];
      echo "<br />";
    }
  }
  // fellowshipNames ();

  /*
    Comme on commence à zéro - car un tableau commence à zéro, il faut utiliser <
    et pas <=
  */

  /*
    Opérateurs de comparaison:
      ==	Permet de tester l’égalité sur les valeurs
      ===	Permet de tester l’égalité en termes de valeurs et de types
      !=	Permet de tester la différence en valeurs
      <>	Permet également de tester la différence en valeurs
      !==	Permet de tester la différence en valeurs ou en types
      <	Permet de tester si une valeur est strictement inférieure à une autre
      >	Permet de tester si une valeur est strictement supérieure à une autre
      <=	Permet de tester si une valeur est inférieure ou égale à une autre
      >=	Permet de tester si une valeur est supérieure ou égale à une autre
  */
?>


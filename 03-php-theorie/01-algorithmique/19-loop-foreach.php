<h1>LOOP / BOUCLE: FOREACH</h1>

<?php

  // LOOP / FOR EACH (POUR CHAQUE)

  /*
    La boucle php foreach est utilisée pour parcourir les valeurs d'un tableau.
    Pour chaque élément du tableau, j'exécute le code
  */

   // Lister le contenu d'un tableau

  function fellowshipNames () {
    $fellowshipMembers = array("Frodon", "Merry", "Sam", "Pippin", "Aragorn", "Boromir", "Gimli", "Legolas", "Gandalf");
    echo "<br />";
    echo "Liste des membres de la Communauté de l'anneau:";
    echo "<br />";
    foreach($fellowshipMembers as $item){
      echo "- " . $item;
      echo "<br />";
    }
  }
  fellowshipNames ();

  // Lister le contenu d'un tableau avec clés
  function fellowshipAge () {
    $charactersAge = array("Aragorn" => "87", "Legolas" => "2931", "Gandalf" => "9000");
    echo "Age des membres de la Communauté de l'anneau:";
    echo "<br />";
    foreach ($charactersAge as $name => $age) {
        echo "Clé=" . $name . ", Valeur=" . $age;
        echo "<br>";
    }
  }
  fellowshipAge();

?>
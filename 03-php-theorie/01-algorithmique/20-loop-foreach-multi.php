<h1>LOOP / BOUCLE: FOREACH - Array multi</h1>

<?php

  // LOOP / FOR EACH (POUR CHAQUE)

  /*
    La boucle php foreach est utilisée pour parcourir les valeurs d'un tableau.
    Pour chaque élément du tableau, j'exécute le code
  */

   // Lister le contenu d'un tableau multidimensionnel
  $charactersList = [
      ["name" => "Aragorn", "age" => 87, "isHobbit" => false],
      ["name" => "Gandalf", "age" => 9000, "isHobbit" => false],
      ["name" => "Frodon", "age" => 37, "isHobbit" => true],
  ];


  function displayArray($charactersList) {
    // On parcourt le tableau $charactersList
    foreach($charactersList as $key => $value){
      echo $key. "<br>";
      // if(is_array($value)){
        // On parcourt les tableaux contenus dans $charactersList
        foreach($value as $key => $valueItem){
              echo $key." : ".$valueItem."<br>";
        }
      // }
      echo "<br>";
    }
  }
  displayArray($charactersList);
?>
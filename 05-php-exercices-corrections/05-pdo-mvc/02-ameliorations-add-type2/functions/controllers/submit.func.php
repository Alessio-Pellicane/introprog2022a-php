<?php
function isSubmited ($dsn) {
  if (isset($_POST["addSubmit"])) {
    // var_dump("Submited Type 1 : " . $_POST["type1"]);
    // var_dump("Submited Type 2 : " . $_POST["type2"]);
    if(isset($_POST["type1"])){
      $valueType1 = $_POST["type1"]+1;
    }

    // Type 2 : case study / étude de cas
    // Case 1: Type 2 a une valeur différente de Type 1
    // Case 2: Type 1 et 2 sont les mêmes => Type 2 est NULL
    // Case 3: Type 2 est à \"aucun\" => Type 2 est NULL

    if(isset($_POST["type2"]) && $_POST["type2"] !== "aucun"){
      // Type 2 a un type de Pokémon sélectionné
      if (isset($_POST["type1"]) && $_POST["type1"] !== $_POST["type2"]) {
        // Case 1
        $valueType2 = $_POST["type2"]+1;
        echo "</br>Case 1: Type 2 a une valeur différente de Type 1</br>";
      } else {
        // Case 2
        $valueType2 = NULL;
        echo "</br>Case 2 : Type 1 et 2 sont les mêmes => Type 2 est NULL</br>";
      }
    } else {
      // Case 3
      $valueType2 = NULL;
      echo "</br>Case 3 : Type 2 est à \"aucun\" => Type 2 est NULL</br>";
    }
    // var_dump("Argument type 1: " . $valueType1);
    // var_dump("Argument type 2: " . $valueType2);
    if(isset($_POST["name"]) && isset($_POST["pv"])){
      addPokemon($dsn, $_POST["name"], $_POST["pv"], $valueType1, $valueType2);
    }
  }

  if (isset($_POST["deleteSubmit"])) {
    if (isset($_POST["useid"])) {
      deletePokemon($dsn, $_POST["useid"]);
    }
  }

  if (isset($_POST["modifySubmit"])) {
    if (isset($_POST["useid"]) && isset($_POST["pv"])) {
      modifyPokemon($dsn, $_POST["useid"], $_POST["pv"]);
    }
  }
}

?>

<?php
function isSubmited ($dsn) {
if (isset($_POST["addSubmit"])) {

    /* Editable ?*/
  if(isset($_POST["editable"])){
    $editable = 1;
  } else {
    $editable = 0;
  }
  var_dump("Editable ? : " . $editable);

  /* Type 1 et Type 2 */
  if(isset($_POST["type1"])){
    $valueType1 = $_POST["type1"]+1;
  }

  if(isset($_POST["type2"]) && $_POST["type2"] !== "aucun"){
    // Type 2 a un type de Pokémon sélectionné
    if (isset($_POST["type1"]) && $_POST["type1"] !== $_POST["type2"]) {
      // Case 1
      $valueType2 = $_POST["type2"]+1;
    } else {
      // Case 2
      $valueType2 = NULL;
    }
  } else {
    // Case 3
    $valueType2 = NULL;
  }

  if(isset($_POST["name"]) && isset($_POST["pv"])){
    addPokemon($dsn, $_POST["name"], $_POST["pv"], $valueType1, $valueType2, $editable);
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

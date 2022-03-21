<?php
function isSubmited ($dsn) {
  if (isset($_POST["addSubmit"])) {
    if(isset($_POST["name"]) && isset($_POST["pv"]) && isset($_POST["type"])){
      addPokemon($dsn, $_POST["name"], $_POST["pv"], $_POST["type"]+1);
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

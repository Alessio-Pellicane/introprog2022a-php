<?php
  require_once("../models/db.func.php");

  $action = isset($_POST["action"]) ? $_POST["action"] : "Erreur";
  $id = isset($_POST["useid"]) ? $_POST["useid"] : -1;

  try{
    $dns = connectDB();
    switch ($action) {
      case "Effacer":
        deletePokemon($dns, $id);
        header('Location: ../../index.php');
        break;
      case "Modifier":
        echo "Modify";
        break;
      case "AddPikachu":
        echo "AddPikachu";
        addPikachu($dns);
        header('Location: ../../index.php');
        break;
      }
    }
  catch (Exception $ex) {
    die("ERREUR FATALE : ". $ex->getMessage().'<form><input type="button" value="Retour" onclick="history.go(-1)"></form>');
  }
?>

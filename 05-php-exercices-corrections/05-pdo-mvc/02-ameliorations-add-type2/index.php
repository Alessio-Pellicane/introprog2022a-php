<?php
  include("./templates/common/header.php");
  include("./templates/common/menu.php");
  require_once("./functions/models/db.func.php");
  require_once("./functions/controllers/submit.func.php");
?>

<h1>Pokédex</h1>

<?php
  /*
    Connexion à la base de données via PDO pour lister les pokémons:
    on passe par le modèle functions/db.func.php
  */
  try{
      $dsn = connectDB();
      $pokemonsList = getAllPokemons($dsn);
      $typesList = getTypes($dsn);
      echo isSubmited($dsn);
  } catch (Exception $ex) {
      die("ERREUR FATALE : " . $ex->getMessage(). "Erreur de connexion !");
  }
?>

<?php
  require_once('./templates/add.tpl.php');
  require_once('./templates/all.tpl.php');
?>

<?php
  include("./templates/common/footer.php");
?>
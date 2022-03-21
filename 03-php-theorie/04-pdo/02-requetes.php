<?php 
  include("common/header.php");
  include("common/menu.php");
?>

<h1>Requêtes SQL - fetchAll</h1>

<?php
  // Connexion à la base des données via PDO.

  define("HOST_NAME", "localhost");
  define("DB_NAME", "db_introprog_pokemons");
  define("USER_NAME", "root");
  define("PWD", "");

  try {
    $connexion = "mysql:host=" . HOST_NAME . ";dbname=" . DB_NAME;
    $dsn = new PDO($connexion, USER_NAME, PWD);
    // On ajoute des attributs de classe
    $dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // gestion des erreurs
    $dsn->exec('set names utf8'); // gestion de l'UTF-8
    // echo "Vous êtes connecté !</br>" ;
  } catch(PDOException $exception) {
    $message = "Erreur de connexion à la DB: " . $exception->getMessage();
    die($message); // affiche le message et sort du script
  }
?>

<?php
  if($dsn) {
    // requêtes sql
    // $req = "select * from pk_list";
    $req = "select * from pk_list";
    // préparation de la requête
    $statement = $dsn->prepare($req);
    // exécution de la requête
    $statement->execute();
    // on récupère le jeu de données (fetch = aller chercher)
    /*
      https://www.php.net/manual/en/pdostatement.fetchall.php
    */
    $result = $statement->fetchAll(PDO::FETCH_GROUP|PDO::FETCH_ASSOC);
    // on affiche les données
    echo "<pre>";
    var_dump($result);
    echo "</pre>";
  }
?>



<?php
  include("common/footer.php");
?>
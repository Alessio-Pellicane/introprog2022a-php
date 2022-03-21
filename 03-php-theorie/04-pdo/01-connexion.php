<?php 
  include("common/header.php");
  include("common/menu.php");
?>

<h1>Connexion PDO</h1>

<?php
  // Connexion à la base des données via PDO.
  /*
    PDO (PHP Data Objects) PDO fournit une interface d'abstraction à l'accès de données,
    ce qui signifie que vous utilisez les mêmes fonctions pour exécuter des requêtes
    ou récupérer les données quel que soit la base de données utilisée.
  */
  define("HOST_NAME", "localhost");
  define("DB_NAME", "db_introprog_pokemons");
  define("USER_NAME", "root");
  define("PWD", "");

  /*
    "::" L'opérateur de résolution de portée qui est utilisé en PHP pour accéder à un attribut
    ou à une fonction statique qui se trouve à l'intérieur d'une classe.
    "->" Accesseur permettant d'utiliser une methode (get/set) afin d'accéder aux attributs d'un objet
  */
  /*
    PDO::ERRMODE_EXCEPTION, génère un rapport d'erreurs.
    ERRMODE_EXCEPTION, donne des infos supplémentaires sur les erreurs PDO (appelées exceptions)
  */
  /*
    TRY / CATCH : sécurité permettant de tester une méthode (TRY)et si elle échoue de prévoir une autre
    opération
  */

  try {
    // $connexion = "mysql:host=" . HOST_NAME . ";dbname=" . DB_NAME; // pas d'espace ";dbname"
    $dsn = new PDO("mysql:host=" . HOST_NAME . ";dbname=" . DB_NAME, USER_NAME, PWD);
    // On ajoute des attributs de classe
    $dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // gestion des erreurs
    $dsn->exec('set names utf8'); // gestion de l'UTF-8
    echo "Vous êtes connecté !</br>" ;
    echo "<pre>";
    print_r($dsn);
    echo "</pre>";
  } catch(PDOException $exception) {
    $message = "Erreur de connexion à la DB: " . $exception->getMessage();
    die($message); // affiche le message et sort du script
  }
?>

<?php
  include("common/footer.php");
?>
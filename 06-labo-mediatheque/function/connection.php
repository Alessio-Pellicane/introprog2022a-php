<?php
  // Connexion DB
  function connectDB(){
    $PORT = "3308";
    $HOST_NAME = "localhost";
    $DB_NAME = "mediatheque";
    $USER_NAME="root";
    $PWD= "";

    try {
      $connexion = "mysql:port=".$PORT."host=" . $HOST_NAME . ";dbname=" . $DB_NAME;
      $dsn = new PDO($connexion, $USER_NAME, $PWD);
      // On ajoute des attributs de classe
      $dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // gestion des erreurs
      $dsn->exec('set names utf8'); // gestion de l'UTF-8
      return $dsn;
      echo "Vous êtes connecté !</br>" ;
 

    } catch (PDOException $exception) {
      $message = "Erreur de connexion à la DB: " . $exception->getMessage();
      die($message); // affiche le message et sort du script
    }
  }
?>
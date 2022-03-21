  <?php

    // Connexion DB

    function connectDB(){
      define("HOST_NAME", "localhost");
      define("DB_NAME", "db_introprog_pokemons");
      define("USER_NAME", "root");
      define("PWD", "");

      try {
        $connexion = "mysql:host=" . HOST_NAME . ";dbname=" . DB_NAME . ";charset=utf8";
        $dsn = new PDO($connexion, USER_NAME, PWD);
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

    // Requête get all Pokémons
      function getAllPokemons(PDO $dsn) {
        // requête sur tous les éléments de la table _pk_list_
        $pokemonsList = [];
        $sql = "SELECT * FROM pk_list";
        $stmt = $dsn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $pokemonsList=$stmt->fetchAll();
        return $pokemonsList;
      }

      // Requête get Type
      function getTypes(PDO $dsn) {
        $typesList = [];
        $sql = "SELECT * FROM pk_types";
        $stmt = $dsn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $typesList=$stmt->fetchAll();
        return $typesList;
      }

      // Requête Delete Pokemon
      function deletePokemon(PDO $dsn, $pkid) {
        $sql = "DELETE FROM pk_list WHERE Id = :pkid;";
        $stmt = $dsn->prepare($sql);
        $stmt->bindValue('pkid', $pkid, PDO::PARAM_INT);
        $stmt->execute();
        header('Location: '.$_SERVER['PHP_SELF']);
      }

      // Add Pokémon
      function addPokemon(PDO $dsn, $name, $pv, $type1, $type2) {
        // var_dump("type 2 : " . $type2);
        if (!$type2) {
          $sql = "INSERT INTO pk_list (Id, Name, Pv, Image, Type1, Type2, Editable) VALUES (NULL, :name, :pv, 'Default.png', :type1, NULL, '1');";
          $stmt = $dsn->prepare($sql);
        } else {
          $sql = "INSERT INTO pk_list (Id, Name, Pv, Image, Type1, Type2, Editable) VALUES (NULL, :name, :pv, 'Default.png', :type1, :type2, '1');";
          $stmt = $dsn->prepare($sql);
          $stmt->bindValue('type2', $type2, PDO::PARAM_INT);
        }
        // $sql = "INSERT INTO pk_list (Id, Name, Pv, Image, Type1, Type2, Editable) VALUES (NULL, :name, :pv, 'Default.png', :type, NULL, '1');";
        // $stmt = $dsn->prepare($sql);
        $stmt->bindValue('name', $name, PDO::PARAM_STR);
        $stmt->bindValue('pv', $pv, PDO::PARAM_INT);
        $stmt->bindValue('type1', $type1, PDO::PARAM_INT);
        // $stmt->bindValue('type2', $type2, PDO::PARAM_INT);
        $stmt->execute();
        header('Location: '.$_SERVER['PHP_SELF']);
      }

      // Requête Ajouter Pikachu
      function addPikachu(PDO $dsn){
        $sql = "INSERT INTO pk_list (Id, Name, Pv, Image, Type1, Type2, Editable) VALUES (NULL, 'Pikachu', '35', 'Pikachu.png', '5', NULL, '1');";
        $stmt = $dsn->prepare($sql);
        $stmt->execute();
        header('Location: '.$_SERVER['PHP_SELF']);
      }

      // Modify Pokémon
      function modifyPokemon(PDO $dsn, $pkid, $pv) {
        // echo $pkid . "-" . "$pv";
        $sql = "UPDATE pk_list SET Pv = :pv  WHERE Id = :pkid;";
        $stmt = $dsn->prepare($sql);
        $stmt->bindValue('pkid', $pkid, PDO::PARAM_INT);
        $stmt->bindValue('pv', $pv, PDO::PARAM_INT);
        $stmt->execute();
        header('Location: '.$_SERVER['PHP_SELF']);
      }
  ?>
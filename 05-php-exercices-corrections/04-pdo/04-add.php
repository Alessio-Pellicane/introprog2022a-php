<?php
  include("./templates/common/header.php");
  include("./templates/common/menu.php");
?>

<h1>Pokédex</h1>

<?php

  // 1. Connexion DB (fonction)

  function connectDB(){
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
      return $dsn;
      echo "Vous êtes connecté !</br>" ;
    } catch (PDOException $exception) {
      $message = "Erreur de connexion à la DB: " . $exception->getMessage();
      die($message); // affiche le message et sort du script
    }
  }

  // 2. Fonctions avec les requêtes + helpers

  // Requête get all Pokémons
  function getAllPokemons(PDO $dsn) {
    $pokemonsList = [];
    $sql = "SELECT * FROM pk_list";
    $stmt = $dsn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $pokemonsList=$stmt->fetchAll();

    return $pokemonsList;
  }

  // Requête get Pokémon Types
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
  function addPokemon(PDO $dsn, $name, $pv, $type1) {
    // echo $name . "-" . $pv . "-" . $type1;
    $sql = "INSERT INTO pk_list (Id, Name, Pv, Image, Type1, Type2, Editable) VALUES (NULL, :name, :pv, 'Default.png', :type, NULL, '1');";
    $stmt = $dsn->prepare($sql);
    $stmt->bindValue('name', $name, PDO::PARAM_STR);
    $stmt->bindValue('pv', $pv, PDO::PARAM_INT);
    $stmt->bindValue('type', $type1, PDO::PARAM_INT);
    $stmt->execute();
    header('Location: '.$_SERVER['PHP_SELF']);
  }

  // Helper: Lier les types de Pokémon à la table des types et retourner la chaîne avec le bon type
  function displayType($typesList, $id) {
    foreach($typesList as $key => $value) {
      if ($id-1 === $key){
        // Transforme la valeur du tableau en string, évite les problèmes d'accents
        $value = json_encode($value["Type"], JSON_UNESCAPED_UNICODE);
        // Enlève les guillemets de la string (methode string)
        return trim($value, '"');
      }
    }
  }
?>

<?php

  // 3. Connexion à la base de données via PDO pour lister les pokémons + contrôle des actions

  try{
      $dsn = connectDB();
      $pokemonsList = getAllPokemons($dsn);
      $typesList = getTypes($dsn);

      // Gestion des submits

      // Ajouter Pokémon
      if(isset($_POST['addPokemon']))
      {
        if(isset($_POST["name"]) && isset($_POST["pv"]) && isset($_POST["type"])){
          addPokemon($dsn, $_POST["name"], $_POST["pv"], $_POST["type"]+1);
        }
      }

      // Delete Pokémon
      if(isset($_POST['delete']))
      {
        // echo $_POST["useid"];
        deletePokemon($dsn, $_POST["useid"]);
      }

      if(isset($_POST['modify']))
      {
        echo $_POST["useid"];
        //  deletePokemon($dsn, $id);
      }
  } catch (Exception $ex) {
      die("ERREUR FATALE : " . $ex->getMessage(). "Erreur de connexion !");
  }
?>

<!-- HTML / Vue -->
<h2>Ajout d'un Pokémon</h2>
<form action='#' method='post' class="addPokemon">
  <label for="name">Nom : </label>
  <input type="text" id="name" name="name" required>
  <label for="pv"> Points de vie : </label>
  <input type="number" name="pv" min="1" max="50" required>
  <select name="type" required>
    <?php
        foreach($typesList as $key => $value) {
          $value = trim(json_encode($value["Type"], JSON_UNESCAPED_UNICODE), '"');
          echo "<option value=\"$key\">$value</option>";
        }
    ?>
    </select>
  <input type='submit' name='addPokemon' value='Ajouter Pokémon'>
</form>
<!-- Table avec la liste des Pokémons -->
<table>
  <thead>
    <tr>
      <th>Name</th>
      <th>Pv</th>
      <th>Image</th>
      <th>Type1</th>
      <th>Type2</th>
      <th>Editable</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($pokemonsList as $key => $value):?>
      <tr>
        <td><?php echo ($value['Name']); ?></td>
        <td><?php echo ($value['Pv']); ?></td>
        <td><?php echo ($value['Image']); ?></td>
        <td><?php echo displayType($typesList, $value['Type1']); ?></td>
        <td><?php echo displayType($typesList, $value['Type2']); ?></td>
        <td>
          <?php
            if ($value['Editable']) {
              echo "<form action='#' method='post'>";
              echo "<input type='hidden' name='useid' value='{$value["Id"]}' />";
              echo "<input type='submit' name='delete' value='Effacer'>";
              echo "</form>";
            }
            else { echo "Non"; }
          ?>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>

<?php
  // require_once('./templates/all.tpl.php');
?>

<?php
  include("./templates/common/footer.php");
?>
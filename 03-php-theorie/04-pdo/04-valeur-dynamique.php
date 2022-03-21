<?php 
  include("common/header.php");
  include("common/menu.php");
?>

<h1>Test PDO</h1>

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
    // Requêtes: lister les Pokémons avec plus de 50Pv

    // exemple 1: donnés en dur
    // $reqList = "SELECT * FROM pk_list where Pv > 50";
    // $statementList = $dsn->prepare($reqList);
    // $statementList->execute();

    // exemple 2: avec variable (ne pas faire : permet les attaques par sql injection)
    // $pvValue = 50;
    // $reqList = "SELECT * FROM pk_list where Pv >" . $pvValue;
    // $statementList = $dsn->prepare($reqList);
    // $statementList->execute();

    // exemple 3: avec PDOStatement::bindValue
    $pvValue = 50;
    $reqList = "SELECT * FROM pk_list where Pv > :value";
    $statementList = $dsn->prepare($reqList);
    $statementList->bindValue('value', $pvValue, PDO::PARAM_INT); // on protège la valeur
    $statementList->execute();
  }
?>

  <h2>Pokémon list (ex: > 50)</h2>
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
      <?php while($row = $statementList->fetch(PDO::FETCH_ASSOC)) : ?>
        <tr>
          <td><?php echo ($row['Name']); ?></td>
          <td><?php echo ($row['Pv']); ?></td>
          <td><?php echo ($row['Image']); ?></td>
          <td><?php echo ($row['Type1']); ?></td>
          <td><?php echo ($row['Type2']); ?></td>
          <td>
            <?php
              if ($row['Editable']) { echo "Yes"; }
              else { echo "No"; }
            ?>
          </td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>

<?php
  include("common/footer.php");
?>
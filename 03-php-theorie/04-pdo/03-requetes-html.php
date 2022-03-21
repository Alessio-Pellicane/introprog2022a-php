<?php 
  include("common/header.php");
  include("common/menu.php");
?>

<h1>Résultat dans le HTML</h1>

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
  // Requêtes
  if($dsn) {
    // requête sur tous les éléments de la table _pk_list_
    $reqList = "SELECT * FROM pk_list";
    $statementList = $dsn->prepare($reqList);
    $statementList->execute();
  }
?>

  <h2>Pokémon list</h2>
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
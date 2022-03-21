<?php
  /*
    On démarre ou restaure une session, un cookie est créé.
    Attention, désactivez les bloqueurs de pubs et de cookies sur vos sites en développement.
  */
  session_start();
?>
<?php
  include("common/header.php");
  include("common/menu.php");
?>

<h1>Sessions en PHP : Start</h1>

<?php
  $name = "Vincent";
  $_SESSION["name"] = $name;
?>



<?php
  echo "Bonjour " . $name . " (variable) <br>"; // affiché
  echo "Bonjour " . $_SESSION["name"] . " (session) <br>";; // // affiché
?>


<?php
  include("common/footer.php");
?>
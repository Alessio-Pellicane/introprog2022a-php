<?php
  session_start();

  if( isset( $_SESSION["counter"] ) ) {
    $_SESSION["counter"] += 1;
  }else {
    $_SESSION["counter"] = 1;
  }

  if (isset($_SESSION["name"]) && isset($_SESSION["counter"])) {
    $msg = $_SESSION["name"] . ", vous avez visité cette page ".  $_SESSION["counter"];
    $msg .= " fois dans cette session.";
  }
?>
<?php
  include("common/header.php");
  include("common/menu.php");
?>

<h1>Sessions en PHP : lecture</h1>

<?php
if (isset($_SESSION["name"]) && isset($_SESSION["counter"])) {
  // echo $name; // erreur car n'est pas défini
  echo "\$_SESSION[\"name\"] : " . $_SESSION["name"] . "<br>"; // affiché car super globale
  $newVarName = $_SESSION["name"]; // on recrée une variable locale depuis la super globale
  echo "\$newVarName : " . $newVarName . "<br>";
  echo ( $msg );
}
else {
  echo "<p>Il n'y a pas de session active !</p>";
}
?>

<?php
  include("common/footer.php");
?>
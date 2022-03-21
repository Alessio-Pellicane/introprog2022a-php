<?php
  include("common/header.php");
  include("common/menu.php");
?>

<h1>Sessions en PHP: Destroy</h1>

<?php
  // Démarrage ou restauration de la session
  session_start();
  // Réinitialisation du tableau de session
  // On le vide intégralement
  $_SESSION = array();
  // Destruction de la session
  session_destroy();
  // Destruction du tableau de session
  unset($_SESSION);
  // echo "\$_SESSION[\"name\"] : " . $_SESSION["name"]; // erreur, n'existe plus
  /*
    La session est deletée sur le serveur mais le cookie reste sur la machine client, 
    même s'il est vide
    Tip : on peut le détruire via :
  */
  setcookie('PHPSESSID', '', time() - 3600, '/');
  echo "<p>Cookie et session détruits !</p>"
?>

<?php
  include("common/footer.php");
?>
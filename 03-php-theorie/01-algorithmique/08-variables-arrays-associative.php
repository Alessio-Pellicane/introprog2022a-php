<h1>VARIABLES (Array / Tableaux associatifs)</h1>

<?php

  /*
    Les tableaux associatifs sont des tableaux qui utilisent des clés nommées qui leur sont affectées.
    On utilise "=>" pour assigner une valeur à une clé.
    array("Clé" => "Valeur", "Clé" => "Valeur", ...)
  */

  $charactersAge = array("Aragorn" => "87", "Legolas" => "2931", "Gandalf" => "9000");
  echo "Aragorn a " . $charactersAge["Aragorn"] . " ans.";
  echo "<br />";
  echo "Legolas a " . $charactersAge["Legolas"] . " ans.";
  echo "<br />";
  echo "Gandalf a " . $charactersAge["Gandalf"] . " ans.";
  echo "<br />";

  $charactersAge["Gimli"] = "139";
  echo implode(",", $charactersAge);
?>
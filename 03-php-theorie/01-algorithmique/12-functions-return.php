<h1>FONCTIONS (return)</h1>

<?php
  // FONCTIONS (2)

  // Les fonctions peuvent retourner des informations qui ne seront pas affichées dans la navigateur
  function calculate () {
    $a = 15;
    $b = 10;
    $c = 0;
    // return $a + $b;
    return $c = $a + $b;
  }
  // echo calculate();

  echo "<br />";

  function calculate2 ($c) {
    $a = 15;
    $b = 10;
    return $a + $b + $c;
  }
  echo calculate2(5);

?>
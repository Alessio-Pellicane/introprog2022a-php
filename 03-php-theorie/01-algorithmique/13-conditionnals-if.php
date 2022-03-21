<h1>CONDITIONELLES (If...)</h1>

<?php

  // CONDITIONELLES (IF)

  $personName1 = "Frodon";
  $personAge1 = 33;

  $personName2 = "Sam";
  $personAge2 = 21;

  function displayOlder ($personName1, $personAge1, $personName2, $personAge2) {
    // Conditionnelle = boolean
    if ($personAge1 > $personAge2) {
      echo $personName1 . " est le plus âgé";
    } else {
      echo $personName2 . " est le plus âgé";
    }
  }
  displayOlder ($personName1, $personAge1, $personName2, $personAge2);

  /*
      ($personAge1 > $personAge2)
      est la même chose que
      ($personAge1 > $personAge2) === true
  */
?>
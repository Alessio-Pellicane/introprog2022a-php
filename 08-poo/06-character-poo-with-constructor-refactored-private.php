<?php
  require_once("classes/characters.class.php");
  include("common/header.php");
  include("common/menu.php");
?>


<h2> Personnages : </h2>
<?php
  echo "<div class='card-content-all'>";
  $ch1 = new Character("Elf", "elfe.jpg", 512, false, 5, 4); // nouvelle instance de classe
  $ch1->templateDisplay ();
  $ch2 = new Character("Orc", "orc.jpg", 13, true, 7, 2); // nouvelle instance de classe
  /*
    Avec les propriétés en private il est impossible d'y accéder (get) ou de les modifier (set)
  */
  // echo $ch2->type; // Uncaught Error: Cannot access private property Character::$name
  // $ch2->type="Mage"; // Uncaught Error: Cannot access private property Character::$name
  $ch2->templateDisplay ();
  $ch3 = new Character("Elf", "elfe.jpg", 654, false, 4, 4); // nouvelle instance de classe
  $ch3->templateDisplay ();
  echo "</div>";
?>

<?php
  include("common/footer.php");
?>
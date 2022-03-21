<?php
  require_once("classes/characters.class.php");
  include("common/header.php");
  include("common/menu.php");
?>

<h2> Personnages : </h2>
<?php
  echo "<div class='card-content-all'>";
  $ch1 = new Character("Elf", "elfe.jpg", 512, Character::FEMALE, Character::FORCE_MAX, Character::AGILITY_MED); // nouvelle instance de classe
  $ch1->templateDisplay ();
  $ch2 = new Character("Orc", "orc.jpg", 13, Character::MALE, Character::FORCE_MIN, Character::AGILITY_MAX); // nouvelle instance de classe
  // $ch2->setType("Mage");
  $ch2->templateDisplay ();
  $ch3 = new Character("Elf", "elfe.jpg", 654, Character::FEMALE, Character::FORCE_MED, Character::AGILITY_MIN); // nouvelle instance de classe
  $ch3->templateDisplay ();
  echo "</div>";
?>

<?php
  include("common/footer.php");
?>
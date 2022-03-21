<?php
  require_once("classes/characters.class.static.php");
  include("common/header.php");
  include("common/menu.php");
?>

<h2> Personnages : </h2>
<?php
  $ch1 = new Character("Elf", "elfe.jpg", 512, Character::FEMALE, Character::FORCE_MAX, Character::AGILITY_MED); // nouvelle instance de classe
  $ch2 = new Character("Orc", "orc.jpg", 13, Character::MALE, Character::FORCE_MIN, Character::AGILITY_MAX); // nouvelle instance de classe
  $ch3 = new Character("Elf", "elfe.jpg", 654, Character::FEMALE, Character::FORCE_MED, Character::AGILITY_MIN); // nouvelle instance de classe
  // ----
  $allCharacters = Character::getCharacterslist();
  // echo "<pre>";
  // print_r(Character::$characterslist);
  // print_r($allCharacters);
  // echo "</pre>";
  echo "<div class='card-content-all'>";
  foreach ($allCharacters as $character) {
    $character->templateDisplay();
  }
  echo "</div>";
?>

<?php
  include("common/footer.php");
?>
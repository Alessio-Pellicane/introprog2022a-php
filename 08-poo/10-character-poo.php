<?php
  require_once("classes/characters.class.static.php");
  include("common/header.php");
  include("common/menu.php");
?>

<h2> Personnages : </h2>
<?php
  $ch1 = new Character("Elf", "elfe.jpg", 512, Character::FEMALE, Character::FORCE_MED, Character::AGILITY_MED);
  $ch2 = new Character("Orc", "orc.jpg", 13, Character::MALE, Character::FORCE_MAX, Character::AGILITY_MIN);
  $ch3 = new Character("Mage", "mage.jpg", 75, Character::MALE, Character::FORCE_MED, Character::AGILITY_MED);
  $ch3 = new Character("Nécromancien", "necromancer.jpg", 32, Character::FEMALE, Character::FORCE_MED, Character::AGILITY_MED);
  $ch3 = new Character("Nain", "dwarf.jpg", 52, Character::MALE, Character::FORCE_MED, Character::AGILITY_MIN);
  $ch3 = new Character("Paladin", "paladin.jpg", 38, Character::MALE, Character::FORCE_MAX, Character::AGILITY_MED);
  // ----
  $allCharacters = Character::getCharacterslist();
  echo "<div class='card-content-all'>";
  foreach ($allCharacters as $character) {
    $character->templateDisplay();
  }
  echo "</div>";
?>

<?php
  include("common/footer.php");
?>
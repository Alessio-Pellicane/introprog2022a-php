<?php
  include("common/header.php");
  include("common/menu.php");

  class Character {
    // propriétés
    // var public / private / protected
    public $type;
    public $img;
    public $age;
    public $sexe;
    public $force;
    public $agility;

    // constructeur de classe (constructor)
    function __construct($typeArg, $imgArg, $ageArg, $sexeArg, $forceArg, $agilityArg) {
      $this->type = $typeArg;
      $this->img = $imgArg;
      $this->age = $ageArg;
      $this->sexe = $sexeArg;
      $this->force = $forceArg;
      $this->agility = $agilityArg;
    }

    // méthodes
    public function displayInfo() {
      echo "Type : " . $this->type . "<br />";
      echo "Age : " . $this->age . "<br />";
      if($this->sexe){
        echo "Sexe : Homme <br/>";
      } else {
        echo "Sexe : Femme <br/>";
      }
      echo "Force : " . $this->force . "<br />";
      echo "Agilité : " . $this->agility . "<br />";
    }

    public function templateDisplay () {
      echo "<div class='card-content'>";
      echo "<div class=\"gallery-img\"><img  src='sources/images/" . $this->img . "' alt='Character type' /></div>";
      $this->displayInfo();
      echo "</div>";
    }
  }
?>

<h2> Personnages : </h2>
<?php
  echo "<div class='card-content-all'>";
  $ch1 = new Character("Elf", "elfe.jpg", 512, false, 5, 6); // nouvelle instance de classe
  $ch1->templateDisplay ();
  $ch2 = new Character("Mage", "mage.jpg", 75, true, 3, 7); // nouvelle instance de classe
  $ch2->templateDisplay ();
  $ch3 = new Character("Orc", "orc.jpg", 13, true, 7, 2); // nouvelle instance de classe
  $ch3->templateDisplay ();
  echo "</div>";
?>

<?php
  include("common/footer.php");
?>
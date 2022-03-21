<?php
  include("common/header.php");
  include("common/menu.php");

  class Character {
    // propriétés
    // var public / private / protected
    public $type = "Orc";
    public $img = "orc.jpg";
    public $age = 512;
    public $sexe = true;
    public $force = 5;
    public $agility =  4;

    // méthode
    public function displayInfo() {
      // this: signifie que l'on fait référence à l'objet lui même
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
      echo "<div class=\"gallery-img\"><img src='sources/images/" . $this->img . "' alt='Character type' /></div>";
      $this->displayInfo();
      echo "</div>";
    }
  }
?>

<h2> Personnages : </h2>
<?php
  echo "<div class='card-content-all'>";
  $ch1 = new Character(); // nouvelle instance de classe
  $ch1->templateDisplay ();
  $ch2 = new Character(); // nouvelle instance de classe
  $ch2->type = "Elfe";
  $ch2->img = "elfe.jpg";
  $ch2->age = 22;
  $ch2->sexe = false;
  $ch2->force = 3;
  $ch2->agility = 7;
  $ch2->templateDisplay ();
  echo "</div>";
?>

<?php
  include("common/footer.php");
?>
<?php
  include("common/header.php");
  include("common/menu.php");

  class Character {
    // propriétés
    // var public / private / protected
    public $type = "Elfe";
    public $img = "elfe.jpg";
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
        echo "Homme <br/>";
      } else {
        echo "Femme <br/>";
      }
      echo "Force : " . $this->force . "<br />";
      echo "Agilité : " . $this->agility . "<br />";
      echo "----------- <br />";
    }
  }
?>

<h2> Personnages : </h2>
<?php
  $ch1 = new Character(); // nouvelle instance de classe
  // echo "Type : " . $ch1->type . "<br />";
  // echo "Age : " . $ch1->age . "<br />";
  $ch1->displayInfo();
  $ch2 = new Character(); // nouvelle instance de classe
  $ch2->type = "Orc";
  $ch2->age = 22;
  // echo "Type : " . $ch2->type . "<br />";
  // echo "Age : " . $ch2->age . "<br />";
  $ch2->displayInfo();
?>

<?php
  include("common/footer.php");
?>
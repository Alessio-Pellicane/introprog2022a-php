<?php
  include("common/header.php");
  include("common/menu.php");

  // Création d'une classe Character
  class Character {
    // propriétés
    // var public / private / protected
    public $type = "Elfe";
    public $img = "elfe.jpg";
    public $age = 512;
    public $sexe = true;
    public $force = 5;
    public $agility =  4;
  }
?>

<h2> Personnages : </h2>
<?php
  /*
    Note: l'opérateur ' -> ', accessor,  permet d'accéder aux membres (methodes + propriétés) d'un objet crée
    à partir d'une classe, tandis que l'opérateur ' :: ' (aussi appelé Paamayim Nekudotayim) permet
    d'accéder directement aux membres d'une classe sans nécessité de l'instancier.
  */
  $ch1 = new Character(); // nouvelle instance de classe
  echo "Type : " . $ch1->type . "<br />";
  echo "Age : " . $ch1->age . "<br />";
  echo "----------- <br />";
  $ch2 = new Character(); // nouvelle instance de classe
  $ch2->type = "Mage";
  $ch2->age = 22;
  echo "Type : " . $ch2->type . "<br />";
  echo "Age : " . $ch2->age . "<br />";
  echo "----------- <br />";
?>

<?php
  include("common/footer.php");
?>
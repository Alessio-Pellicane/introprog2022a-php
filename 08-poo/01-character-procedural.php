<?php
  include("common/header.php");
  include("common/menu.php");

  $characters = [
    $ch1 = [
      "Type" => "Elfe",
      "Age" => 520,
      "Sexe" => false,
      "Force" => 5,
      "Agilité" => 4,
      "img" => "sources/images/elfe.jpg"
    ],
    $ch2 = [
      "Type" => "Mage",
      "Age" => 75,
      "Sexe" => true,
      "Force" => 3,
      "Agilité" => 6,
      "img" => "sources/images/mage.jpg"
    ],
    $ch3 = [
      "Type" => "Orc",
      "Age" => 5,
      "Sexe" => true,
      "Force" => 7,
      "Agilité" => 2,
      "img" => "sources/images/orc.jpg"
    ],
  ]


?>

<h2> Personnages : </h2>

<?php
  echo "<div class='card-content-all'>";
    foreach($characters as $character) {
      echo "<div class='card-content'>";
        echo "<div class=\"gallery-img\"><img  src='" . $character["img"] . "' alt='Character picture' /></div>";
        foreach ($character as $index => $value) {
            if ($index !== "img") {
            if($index === "Sexe") {
              if($value) {
                echo "Sexe : Homme <br />";
              } else {
                echo "Sexe : Femme <br />";
              }
            } else {

              echo $index . " : " . $value . "<br />";
            }
          }
        }
      echo "</div>";
    }
  echo "</div>";
?>

<?php
    include("common/footer.php");
?>
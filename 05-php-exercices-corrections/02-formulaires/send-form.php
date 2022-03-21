<?php
    // var_dump($_POST);
    echo "<h2>Contenu du formulaire: </h2>" . "<br />";
    if(isset($_POST["nom"])){
        echo "<div class=\"result\">";
        echo "Suggestion de : ". $_POST["nom"] . "<br />";
        if(!empty($_POST["radio"])) {
            echo "Votre expérience démoniaque : " . $_POST["radio"] . "<br />";
        } else {
            echo "Veuillez sélectionner un niveau d'expérience !<br />" ;
        }
        if(isset($_POST["commentaire"])){
          echo "Votre plan de conquête du monde : ". $_POST["commentaire"] . "<br />";
        }
        echo "</div>";
    }
?>
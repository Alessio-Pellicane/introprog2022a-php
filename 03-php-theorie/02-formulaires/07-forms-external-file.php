<?php
    // var_dump($_POST);
    echo "Contenu du formulaire:" . "<br />";
    if(isset($_POST["nom"])){
        echo "<div class=\"result\">";
        echo "Votre nom est : ".$_POST["nom"]. "<br />";
        if(isset($_POST["age"])){
            echo "Votre âge est : ".$_POST["age"]. "<br />";
        }
        if(isset($_POST["commentaire"])){
          echo "Votre commentaire : ".$_POST["commentaire"];
        }
        echo "</div>";
    }
?>
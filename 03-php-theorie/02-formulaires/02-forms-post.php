<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulaires: POST</title>
  <style>
    .result {
      padding:10px;
      margin-top:10px;
      border: 2px solid black;
      background-color:rgb(89, 235, 89);
    }
  </style>
</head>
<body>
  <h1>Formulaires: POST</h1>
  <form action="#" method="POST">
    <fieldset>
      <legend>Infos</legend>
      <label for="nom">Votre nom:</label>
      <input type="text" name="nom" required>
      <label for="age">Votre âge:</label>
      <input type="number" name="age">
      <label for="commentaire">Commentaire:</label>
      <input type="textarea" name="commentaire" required>
      <input type="submit" value="Soumettre" required>
    </fieldset>
  </form>
  <?php
      /*
        $_POST est un tableau de variables transmis au script courant via la méthode HTTP POST.
        Plus sécurisé que GET car les données ne sont pas visibles dans l'url.
      */
      // var_dump($_POST);
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
</body>
</html>
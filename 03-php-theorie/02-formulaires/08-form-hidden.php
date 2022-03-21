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
      <input id="prodId" name="id" type="hidden" value="xm234jq">
      <input type="submit" name="submit" value="Envoyer">
    </fieldset>
  </form>
  <?php
  if(isset($_POST["submit"])){
    echo "<div class=\"result\">";
    if(isset($_POST["nom"])){
      echo "Votre nom est : ".$_POST["nom"]. "<br />";
    }
    if(isset($_POST["id"])){
      echo "Id caché: ".$_POST["id"]. "<br />";
    }
    echo "</div>";
  }
  ?>
</body>
</html>
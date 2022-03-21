<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulaires: Boutons radio</title>
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
  <h1>Formulaires: Boutons radio</h1>
  <form action="#" method="post">
    <fieldset>
    <legend>Votre niveau en Java</legend>
      <input type="radio" name="radio" value="Junior"><label>Junior</label>
      <input type="radio" name="radio" value="Medior"><label>Medior</label>
      <input type="radio" name="radio" value="Senior"><label>Senior</label>
      <input type="submit" name="submit" value="Envoyer">
    </fieldset>
  </form>
  <?php
    // Bouton radio
    if(isset($_POST["submit"])){
      echo "<div class=\"result\">";
      if(!empty($_POST["radio"])) {
          echo "Votre niveau est: " . $_POST["radio"];
      } else {
          echo "Veuillez sélectionner un niveau!";
      }
      echo "</div>";
    }
  ?>
</body>
</html>
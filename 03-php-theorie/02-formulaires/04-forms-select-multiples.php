<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulaires: Select multiple</title>
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
  <h1>Formulaires: Select multiple</h1>
  <form action="#" method="post">
    <fieldset>
      <legend>Langage de programmation favori:</legend>
      <select name="languages[]" multiple>
        <option value="" disabled selected>Choisisssez un/des langages</option>
        <option value="Java">Java</option>
        <option value="PHP">PHP</option>
        <option value="Python">Python</option>
        <option value="Javascript">Javascript</option>
        <option value="C#">C#</option>
      </select>
      <input type="submit" name="submit" value="Envoyer">
    </fieldset>
  </form>

  <?php
    // Select
    // var_dump($_POST);
    if(isset($_POST["submit"])){
      echo "<div class=\"result\">";
      if(!empty($_POST["languages"])) {
          echo "Vous avez choisi: " . "<br />";
          foreach ($_POST['languages'] as $language)
          echo  $language . "<br />";
      } else {
          echo "Veuillez sélectionner au moins un langage!";
      }
      echo "</div>";
    }
  ?>
</body>
</html>
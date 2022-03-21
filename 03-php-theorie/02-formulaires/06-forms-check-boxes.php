<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulaires: Check boxes</title>
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
  <h1>Formulaires: Check boxes</h1>
  <fieldset>
    <legend>Langages que vous pratiquez</legend>
    <form action="#" method="post">
      <input type="checkbox" name="check_list[]" value="Java">Java</label>
      <input type="checkbox" name="check_list[]" value="PHP"><label>PHP</label>
      <input type="checkbox" name="check_list[]" value="Python"><label>Python</label>
      <input type="checkbox" name="check_list[]" value="Javascript"><label>Javascript</label>
      <input type="checkbox" name="check_list[]" value="C#"><label>C#</label>
      <input type="submit" name="submit" value="Envoyer"/>
    </form>
  </fieldset>
  <?php
    // Check boxes
    // var_dump($_POST);
    if(isset($_POST["submit"])){
      echo "<div class=\"result\">";
      if(!empty($_POST["check_list"])){
        foreach($_POST["check_list"] as $selected){
          echo $selected."</br>";
        }
      }  else {
        echo "Veuillez sélectionner au moins un langage!";
      }
      echo "</div>";
    }
  ?>
</body>
</html>
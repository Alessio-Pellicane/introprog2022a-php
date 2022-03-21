<?php
function isSubmited ($dsn) {
  if (isset($_POST["addSubmit"])) {

      /* Editable ?*/
    if(isset($_POST["editable"])){
      $editable = 1;
    } else {
      $editable = 0;
    }

    /* Type 1 et Type 2 */
    if(isset($_POST["type1"])){
      $valueType1 = $_POST["type1"]+1;
    }

    if(isset($_POST["type2"]) && $_POST["type2"] !== "aucun"){
      // Type 2 a un type de Pokémon sélectionné
      if (isset($_POST["type1"]) && $_POST["type1"] !== $_POST["type2"]) {
        // Case 1
        $valueType2 = $_POST["type2"]+1;
      } else {
        // Case 2
        $valueType2 = NULL;
      }
    } else {
      // Case 3
      $valueType2 = NULL;
    }

    /* Image Name random with random string */
    if (isset($_FILES["fileToUpload"])){
      // Création d'une chaine de caractère random de 10 caractères
      // la fonction est dans "helpers.func.php"
      $randomString = randomString();
      // Le string créé + le nom de l'image
      $imageName = $randomString . basename($_FILES["fileToUpload"]["name"]);
      // Le répertoire temporaire où PHP stocke l'image
      $imageNameTemp = $_FILES["fileToUpload"]["tmp_name"];
      // On exécute la fonction controlleur d'upload
      // on lui passe en paramètre le nom de l'image ainsi que le répertoire temporaire utilisé par PHP pour stocker l'image
      uploadImage($imageName, $imageNameTemp);
    }

    if(isset($_POST["name"]) && isset($_POST["pv"])){
      addPokemon($dsn, $_POST["name"], $_POST["pv"], $imageName, $valueType1, $valueType2, $editable);
    }
  }

  
  if (isset($_POST["deleteSubmit"])) {
    if(isset($_POST["pokemon-id"]) && isset($_POST["pokemon-image"])){
      $imagePathDelete = "public/assets/images/pokemons/" . $_POST["pokemon-image"];
      var_dump($_POST["pokemon-id"]);
      var_dump($imagePathDelete);
      unlink($imagePathDelete);
      deletePokemon($dsn, $_POST["pokemon-id"]);
    }
  }

  if (isset($_POST["modifySubmit"])) {
    if (isset($_POST["pokemon-id"]) && isset($_POST["pv"])) {
      modifyPokemon($dsn, $_POST["pokemon-id"], $_POST["pv"]);
    }
  }
}

?>

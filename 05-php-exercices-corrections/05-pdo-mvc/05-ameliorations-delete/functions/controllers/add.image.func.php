<?php

  function uploadImage($imageName, $imageNameTemp) {
    // On détermine un répertoire où uploader l'image
    $uploadDir = "public/assets/images/pokemons/";
    // On valide le transfert avec PHP avec 2 arguments
    // 1 - le répertoire temporaire (image d'origine stockée sur le serveur par PHP/Apache)
    // 2 - le répertoire cible (où on va la stocker au final)
    move_uploaded_file($imageNameTemp, $uploadDir .$imageName);
    // NB: si le nom est tronqué dans la DB, vous pouvez ajouter des charactères pour Image dans la DB (fixés à 30 à l'origine)
  }
?>
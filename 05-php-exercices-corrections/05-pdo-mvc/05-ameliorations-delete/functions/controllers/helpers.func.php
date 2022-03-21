<?php
  // Helper: Lier les types de Pokémon à la table des types et retourner la chaîne avec le bon type
  function displayType($typesList, $id) {
    foreach($typesList as $key => $value) {
      if ($id-1 === $key){
        $value = trim(json_encode($value["Type"], JSON_UNESCAPED_UNICODE), '"');
        return $value;
      }
    }
  }

  // Fonction pour générer un string aléatoire afin de ne pas avoir deux fois le même nom d'image
  function randomString($lenght = 10) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($lenght/strlen($x)) )),1,$lenght);
  }
?>

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
?>

<?php
  function writePokemonsList($pokemonsList){
    $ret = "";
    foreach ($pokemonsList as $pokemon) {
      // echo var_dump($pokemon);
        $ret.="
          <tr>

          </tr>";
      }
      return $ret;
  }
?>
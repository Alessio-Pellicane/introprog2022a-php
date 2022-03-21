<?php
  require_once("./functions/controllers/helpers.func.php");
  function writePokemonsList($pokemonsList, $typesList){
    $ret = "";
    foreach ($pokemonsList as $pokemon) {
      // echo var_dump($pokemon);
        $type1Value = displayType($typesList, $pokemon["Type1"]);
        $type2Value = displayType($typesList, $pokemon["Type2"]);
        $ret.=
          "
          <tr>
            <td>{$pokemon["Id"]}</td>
            <td>{$pokemon["Name"]}</td>
            <td>{$pokemon["Pv"]}</td>
            <td>{$pokemon["Image"]}</td>
            <td>{$type1Value}</td>
            <td>{$type2Value}</td>
            <td>" . ($pokemon["Editable"] ?
              "<form action=\"#\" method=\"post\">
              <input type=\"hidden\" name=\"pokemon-id\" value=\"{$pokemon["Id"]}\" />
              <input type=\"hidden\" name=\"pokemon-image\" value=\"{$pokemon["Image"]}\" />
              <input type=\"submit\" name=\"deleteSubmit\" value=\"Effacer\">
              </form>
              <form action=\"#\" method=\"post\">
              <input type=\"number\" name=\"pv\" min=\"1\" max=\"50\" required>
              <input type=\"hidden\" name=\"pokemon-id\" value=\"{$pokemon["Id"]}\" />
              <input type=\"submit\" name=\"modifySubmit\" value=\"Modifier\">
              </form>" : "Non") . "
            </td>
          </tr>
          ";
      }
      return $ret;
  }
?>
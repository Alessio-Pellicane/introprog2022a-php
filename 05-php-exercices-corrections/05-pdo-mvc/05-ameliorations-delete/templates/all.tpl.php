<?php
require_once("./templates/all_func.php");
?>
  <h2>Liste des Pokémons</h2>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Pv</th>
        <th>Image</th>
        <th>Type1</th>
        <th>Type2</th>
        <th>Editable</th>
      </tr>
    </thead>
    <tbody>
      <?php
        echo writePokemonsList($pokemonsList, $typesList);
      ?>
    </tbody>
  </table>
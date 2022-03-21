<h2>Ajout d'un Pokémon</h2>
<form action="#" method="post" class="addPokemon">
  <label for="name">Nom : </label>
  <input type="text" id="name" name="name" required>
  <label for="pv"> Points de vie : </label>
  <input type="number" name="pv" min="1" max="50" required>
  <select name="type1" required>
    <?php
        foreach($typesList as $key => $value) {
          $value = trim(json_encode($value["Type"], JSON_UNESCAPED_UNICODE), '"');
          echo "<option value=\"$key\">$value</option>";
        }
    ?>
    </select>
  <select name="type2">
    <?php
      echo "<option value=\"aucun\" selected>Pas de type 2</option>";
      foreach($typesList as $key => $value) {
        $value = trim(json_encode($value["Type"], JSON_UNESCAPED_UNICODE), '"');
        echo "<option value=\"$key\">$value</option>";
      }
    ?>
  </select>
  <input type="submit" name="addSubmit" value="Ajouter Pokémon">
</form>
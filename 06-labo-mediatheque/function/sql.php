<?php
function genreswitch($a)
{
  $connection = connectDB();
  $x=0;
  $tab=[];
  $genres = [];
    $sql = "SELECT genres_nom FROM genres JOIN films_genres ON  genres_id = fg_genres_id JOIN films ON fg_films_id=films_id where fg_films_id = :filmsid";
    $stmt =$connection->prepare($sql);
    $stmt->bindValue('filmsid', $a, PDO::PARAM_INT);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $genres=$stmt->fetchAll();
    foreach ($genres as $key => $value){
      foreach ($value as $key => $value){
        $tab[$x]=$value;
        $x++;
      }
    }
    // var_dump($tab);
    $retour = implode(" | ",$tab);
    return $retour;

}

function acteurswitch($a)
{
  $connection = connectDB();
  $x=0;
  $tab=[];
  $acteurs = [];
    $sql = "SELECT acteurs_nom FROM acteurs JOIN films_acteurs ON  acteurs_id = fa_acteurs_id JOIN films ON fa_films_id=films_id where fa_films_id = :acteursid";
    $stmt =$connection->prepare($sql);
    $stmt->bindValue('acteursid', $a, PDO::PARAM_INT);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $acteurs=$stmt->fetchAll();
    foreach ($acteurs as $key => $value){
      foreach ($value as $key => $value){
        $tab[$x]=$value;
        $x++;
      }
    }
    // var_dump($tab);
    $retour = implode(" , ",$tab);
    return $retour;

}

function realisateurswitch($a)
  {
    $connection = connectDB();
    $x=0;
    $tab=[];
    $realisateur = [];
      $sql = "SELECT real_nom FROM realisateurs JOIN films ON real_id=films_real_id where films_id = :realid";
      $stmt =$connection->prepare($sql);
      $stmt->bindValue('realid', $a, PDO::PARAM_INT);
      $stmt->execute();
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $realisateur=$stmt->fetch();
      $retour = implode(" , ",$realisateur);
      return $retour;
  
  }

?>
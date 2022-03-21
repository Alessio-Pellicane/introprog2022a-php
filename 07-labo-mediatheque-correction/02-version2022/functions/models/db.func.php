<?php
  function connexion(){
    $db = new PDO('mysql:host=localhost;dbname=mediatheque;charset=UTF8',
      'root','');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Affiche la version du serveur SQL
    // echo $db->query('select version()')->fetchColumn();
    return $db;
  }

  // Récupérer liste des films
  function getFilms($db,&$indiceMaxPage,$nbFilmsParPage,$page){
  //compter le nombre de films présents dans la table films
    $stmt = $db->query('SELECT count(films_id) FROM films');
    //fetchColumn(0) récupère la valeur de la première colonne
    $totalFilms = $stmt->fetchColumn(0);

    $indiceMaxPage = (int)($totalFilms/$nbFilmsParPage);
    if($totalFilms%$nbFilmsParPage == 0){
      //$indinceMAxPage = $indiceMaxPage - 1;
      $indiceMaxPage --;
    }

    //déduire l'indice en fonction de la page et du nombre de films par page
    $indice = $page * $nbFilmsParPage;

    //création de la requete Limit : à partir de la suivante et on en prends 2e param.
    // fecthAll va exécuter la requête
    // et récupérer le résultat sous
    // forme de tableau php
    /*$films = $stmt->fetchAll();*/

    $sql = "SELECT films_id,films_titre, films_resume, films_affiche, films_duree, films_annee, real_id, real_nom, GROUP_CONCAT(DISTINCT acteurs_nom SEPARATOR ', ') AS acteurs, GROUP_CONCAT(DISTINCT genres_nom SEPARATOR ' | ') AS genres FROM films LEFT OUTER JOIN realisateurs ON films_real_id = real_id LEFT OUTER JOIN films_acteurs ON films_id = fa_films_id LEFT OUTER JOIN acteurs ON fa_acteurs_id = acteurs_id LEFT OUTER JOIN films_genres ON fg_films_id = films_id LEFT OUTER JOIN genres ON fg_genres_id = genres_id GROUP BY films_id ORDER BY films_annee DESC, films_titre LIMIT :off, :lim";
    $stmt = $db -> prepare($sql);
    $stmt->bindValue(':off', $indice, PDO::PARAM_INT);
    $stmt->bindValue(':lim', $nbFilmsParPage, PDO::PARAM_INT);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $films=$stmt->fetchAll();
    return $films;
  }

  // Récupérer les films après une recherche
  function getFilmsRech($db,&$indiceMaxPage,$nbFilmsParPage,$page,&$mode){
    $sql = 'SELECT count( distinct films_id ) FROM films JOIN realisateurs ON real_id=films_real_id JOIN films_acteurs ON films_id=fa_films_id JOIN acteurs ON acteurs_id=fa_acteurs_id JOIN films_genres on fg_films_id=films_id JOIN genres on genres_id=fg_genres_id WHERE films_titre LIKE :search OR real_nom LIKE :search OR acteurs_nom LIKE :search or genres_nom LIKE :search or films_resume LIKE :search';
    $stmt = $db->prepare($sql);
    $mode=isset($_POST['recherche'])?$_POST['recherche']:$mode;
    $rech="";
    if($mode<>""){
      $rech=$mode;
    }else{
      $rech=$_POST["recherche"];
    }
    $stmt->execute( array(':search' => '%'.$rech.'%') );
    //fetchColumn(0) récupère la valeur de la première colonne

    $totalFilms = $stmt->fetchColumn(0);
    $indiceMaxPage = (int)($totalFilms/$nbFilmsParPage);
    if($totalFilms%$nbFilmsParPage == 0 && $indiceMaxPage!=0){
      $indiceMaxPage --;
    }

    //déduire l'indice en fonction de la page et du nombre de films par page
    $indice = $page * $nbFilmsParPage;
    $rech='%'.$rech.'%';
    //Si on a lancé la recherche
    $sql = "SELECT films_id,films_titre, films_resume, films_affiche, films_duree, films_annee, real_id, real_nom, GROUP_CONCAT(DISTINCT acteurs_nom SEPARATOR ', ') AS acteurs, GROUP_CONCAT(DISTINCT genres_nom SEPARATOR ' | ') AS genres FROM films LEFT OUTER JOIN realisateurs ON films_real_id = real_id LEFT OUTER JOIN films_acteurs ON films_id = fa_films_id LEFT OUTER JOIN acteurs ON fa_acteurs_id = acteurs_id LEFT OUTER JOIN films_genres ON fg_films_id = films_id LEFT OUTER JOIN genres ON fg_genres_id = genres_id GROUP BY films_id HAVING acteurs LIKE :search OR films_titre LIKE :search OR real_nom LIKE :search OR genres LIKE :search OR films_resume LIKE :search LIMIT :off,:lim";

    $stmt = $db->prepare($sql);
    $stmt -> bindParam('search', $rech);
    $stmt -> bindParam('off', $indice, PDO::PARAM_INT);
    $stmt -> bindParam('lim', $nbFilmsParPage, PDO::PARAM_INT);
    $stmt->execute();
    $films = $stmt->fetchAll();
    return $films;
  }

?>
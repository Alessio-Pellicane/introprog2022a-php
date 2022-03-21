<?php
//navigation

 
  $connection = connectDB();
  if ((isset($_GET["s"]) and $_GET["s"] == "Rechercher")) {
    
  // On détermine sur quelle page on se trouve
  if (isset($_GET['page']) && !empty($_GET['page'])) {
    $_SESSION["currentPage"] = (int) strip_tags($_GET['page']);
  } else {
    $_SESSION["currentPage"] = 1;
  }
 
  $_GET["terme"] = htmlspecialchars($_GET["terme"]); //pour sécuriser le formulaire contre les intrusions html 
  
  $terme = $_GET["terme"];

    
    // On détermine le nombre total d'articles en commencent par une requete sql pour obtenir le nombre de films
    if (isset($terme)) {

      $sql =$connection->prepare("SELECT films_id AS nb_films from films 
      left outer join films_acteurs on films_id=fa_films_id 
      left outer join acteurs on fa_acteurs_id=acteurs_id 
      left outer join realisateurs on real_id=films_real_id 
      left outer join films_genres on films_id=fg_films_id 
      left outer join genres on fg_genres_id=genres_id 
      where films_titre like :recherche or real_nom like :recherche
      or acteurs_nom like :recherche or genres_nom like :recherche 
      or films_resume like :recherche  group by films_id;");

      $_SESSION["recherche"] =$terme;
      // var_dump($_SESSION["recherche"]);
      $rech="%" . $terme . "%";

      $sql->bindParam('recherche',$rech);
      $sql->bindParam('recherche_enregistre',$_SESSION["recherche"]);

      $sql->execute();

      // On récupère le nombre d'articles
      $result = $sql->fetchAll();
      
  
      // on recnte le tous 
      $nbFilms = (int) count($result);

      

      // On détermine le nombre d'articles par page
      $parPage = 10;

      // On calcule le nombre de pages total
      $_SESSION["page"] = ceil($nbFilms / $parPage);

      // Calcul du 1er article de la page
      $premier = ($_SESSION["currentPage"] * $parPage) - $parPage;

      $query = $connection->prepare("SELECT * from films 
      left outer join films_acteurs on films_id=fa_films_id 
      left outer join acteurs on fa_acteurs_id=acteurs_id 
      left outer join realisateurs on real_id=films_real_id 
      left outer join films_genres on films_id=fg_films_id 
      left outer join genres on fg_genres_id=genres_id 
      where films_titre like :recherche or real_nom like :recherche
      or acteurs_nom like :recherche or genres_nom like :recherche 
      or films_resume like :recherche
      group by films_id LIMIT :premier, :parpage;");


      $rech="%" . $terme . "%";
      $query->bindParam('recherche',$rech);
      $query->bindParam('premier', $premier, PDO::PARAM_INT);
      $query->bindParam('parpage', $parPage, PDO::PARAM_INT);
      $query->bindParam('recherche_enregistre',$_SESSION["recherche"]);
      
      $query->execute();
      
      // On récupère les valeurs dans un tableau associatif
      $films = $query->fetchAll(PDO::FETCH_ASSOC);

      
    }
  }
  else{
    if (isset($_GET['page']) && !empty($_GET['page'])) {
      $_SESSION["currentPage"] = (int) strip_tags($_GET['page']);
    } else {
      $_SESSION["currentPage"] = 1;
    }
    
      // On détermine le nombre total d'articles
  $sql = 'SELECT COUNT(*) AS nb_films FROM films;';
  
  // On prépare la requête
  $query =$connection->prepare($sql);
  
  // On exécute
  $query->execute();
  
  // On récupère le nombre d'articles
  $result = $query->fetch();
 
  $nbFilms = (int) $result['nb_films'];
  
  // On détermine le nombre d'articles par page
  $parPage = 10;
  
  // On calcule le nombre de pages total
  $_SESSION["page"] = ceil($nbFilms / $parPage);
  
  // Calcul du 1er article de la page
  $premier = ($_SESSION["currentPage"] * $parPage) - $parPage;
  
  $sql = 'SELECT * FROM films LIMIT :premier, :parpage;';
  
  // On prépare la requête
  $query =$connection->prepare($sql);
  
  $query->bindValue(':premier', $premier, PDO::PARAM_INT);
  $query->bindValue(':parpage', $parPage, PDO::PARAM_INT);
  
  // On exécute
  $query->execute();
  
  // On récupère les valeurs dans un tableau associatif
  $films = $query->fetchAll(PDO::FETCH_ASSOC);
  
  }

?> 


<h1>CONSTANTES</h1>

<?php
 // Constantes: comme une variable mais ne peut être réassignée

  define("MIN_AGE", 12);
  // define("MIN_AGE", 15); // Constant MIN_AGE already defined
  // $MIN_AGE= 18; // undefined

  echo MIN_AGE;

  /* Contantes magiques: constantes prédéfinies changeant selon le contexte (non sensibles à la casse) */

  /*
  __LINE__	Représente le numéro de la ligne courante là où il est utilisé.
  __FILE__	Représente le chemin d’accès complet et le nom du fichier.
  __DIR__	Représente le chemin complet du répertoire du fichier. Équivalent à dirname(__file__). Il n’a pas de Slash « / » à la fin, sauf s’il s’agit d’un répertoire racine.
  __FUNCTION__	Représente le nom de la fonction là où elle est utilisée.
  __CLASS__	Représente le nom de la classe là où elle est utilisé.
  __TRAIT__	Représente le nom du trait là où il est utilisé.
  __METHOD__	Représente le nom de la méthode du classe là où elle est utilisée. Le nom de la méthode est retourné tel qu’il a été déclaré.
  __NAMESPACE__	Représente le namespace actuel.
  */
  echo "<br />";
  echo __DIR__;
?>
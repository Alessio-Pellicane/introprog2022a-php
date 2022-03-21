<?php
  class Character {
    // PROPRIÉTÉS (variables définies dans une classe ou ajoutées à un objet après sa création)
    /*
      On déclare les variables utilisées dans la classe
      Les variables peuvent être:
        - public (accessibles depuis l'ensemble de l'application)
        - private (accessible uniquement accessible dans la classe qui les déclare)
        - protected (accessible dans la classe déclarante et dans les sous classe par héritage)
      On utilise les constantes pour les propriétés dont la valeur ne changera jamais.
      Par convention l'on notera les constantes en majuscules (snake case).
    */
    private $type;
    private $img;
    private $age;
    private $sex;
    private $force;
    private $agility;

    const MALE = true;
    const FEMALE = false;

    const FORCE_MAX = 6;
    const FORCE_MED = 5;
    const FORCE_MIN = 4;

    const AGILITY_MAX = 6;
    const AGILITY_MED = 5;
    const AGILITY_MIN = 4;

    // --- Attribut static
    /*
      Le fait de déclarer des propriétés ou des méthodes comme statiques permet d'y accéder
      sans avoir besoin d'instancier la classe. Ceci peuvent être accédé statiquement
      depuis une instance d'objet.
      Comme les méthodes statiques peuvent être appelées sans qu'une instance d'objet
      n'ait été créée, la pseudo-variable $this n'est pas disponible dans les méthodes
      déclarées comme statiques.
      Les propriétés statiques sont accédées en utilisant l' opérateur de résolution de portée (::)
      et ne peuvent pas être accédé à travers l'opérateur objet (->).
    */
    private static $characterslist = [];

    // MÉTHODES

    // --- Méthodes Getter / Setter

    /*
      Avec les propriétés en private il est impossible d'accéder aux propriétés (get)
      ou de les modifier (set) en dehors de la classe.
      En fonction des besoins, si on doit accéder ou modifier ces propriétés en dehors de la classe,
      il faut créer des getters / setters.
    */

    // ------ Getter
    function getType() {return $this->type;}
    function getImg() {return $this->img;}
    function getAge() {return $this->age;}
    function getSexe() {return $this->sex;}
    function getForce() {return $this->force;}
    function getAgility() {return $this->agility;}

    public static function getCharacterslist () {
      return self::$characterslist;
    }

    // ------ Setter
    function setType($typeArg) {$this->type=$typeArg;}
    function setImg($imgArg) {$this->type=$imgArg;}
    function setAge($ageArg) {$this->type=$ageArg;}
    function setSex($sexArg) {$this->type=$sexArg;}
    function setForce($forceArg) {$this->type=$forceArg;}
    function setAgility($agilityArg) {$this->type=$agilityArg;}

    // --- Méthode constructeur de classe (constructor)
    /*
      Permet de modifier les propriétés en fonction des instances de la classe.
      Ces propriétés sont passées en argument lors de la création de l'instance.
    */
    /*
      L'opérateur ' -> ', accessor,  permet d'accéder aux membres (methodes + propriétés)
      d'un objet crée à partir d'une classe,
      tandis que l'opérateur ' :: ', opérateur de résolution de portée (aussi appelé Paamayim Nekudotayim)
      permet d'accéder directement aux membres d'une classe sans nécessité
      de l'instancier (ex: constantes).
    */
    function __construct($typeArg, $imgArg, $ageArg, $sexArg, $forceArg, $agilityArg) {
      $this->type = $typeArg;
      $this->img = $imgArg;
      $this->age = $ageArg;
      $this->sex = $sexArg;
      $this->force = $forceArg;
      $this->agility = $agilityArg;
      /*
        On utilise ' self:: ' pour accéder à la propriété statique
        On peut ensuite y accéder sans instancier la classe.
        ex: print_r(Character::$characterslist);
      */
      self::$characterslist[] = $this;
    }

    // --- Méthodes ( = fonctions / traitements effectués par la classe)
    public function displayInfo() {
      /*
        this: signifie que l'on fait référence à l'objet lui même
        ex: "$ch1->templateDisplay ();", $this fera récéfence à "$ch1"
      */
      echo "Type : " . $this->type . "<br />";
      echo "Age : " . $this->age . "<br />";
      if($this->sex){
        echo "Sexe : Homme <br/>";
      } else {
        echo "Sexe : Femme <br/>";
      }
      echo "Force : " . $this->force . "<br />";
      echo "Agilité : " . $this->agility . "<br />";
    }

    public function templateDisplay () {
      echo "<div class='card-content'>";
      echo "<div class=\"gallery-img\"><img  src='sources/images/" . $this->img . "' alt='Character type' /></div>";
      $this->displayInfo();
      echo "</div>";
    }
  }
?>

<!-- ----- debut Router1 -->
<?php
require ('../controller/ControllerVin.php');
require ('../controller/ControllerProducteur.php');
require ('../controller/ControllerCave.php');
require ('../controller/ControllerRecolte.php');

// --- récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];

// fonction parse_str permet de construire 
// une table de hachage (clé + valeur)
parse_str($query_string, $param);

// --- $action contient le nom de la méthode statique recherchée
$action = htmlspecialchars($param["action"]);

//modif du routeur pour prendre en compte l'ensemble des paramètres
$action = $param['action'];

//on supp l'élément action de la structure
unset($param['action']);

//tout ce qui reste sont des arguments
$args = $param;

// --- Liste des méthodes autorisées
switch ($action) {
 case "vinReadAll" :
 case "vinReadOne" :
 case "vinReadId" :
 case "vinCreate" :
 case "vinCreated" :
 case "vinDeleted" :
  ControllerVin::$action($args);
 case "producteurReadAll" :
 case "producteurReadId" :
 case "producteurReadOne" :
 case "producteurCreate" :
 case "ReadRegions" :
 case "ReadNbProducteurByRegion" :
 case "producteurCreated" :
 case "producteurDeleted" :
  ControllerProducteur::$action($args);
 case "recolteInsert" :
 case "getRecolte" :
 case "selectFiltre" :
  ControllerRecolte::$action($args);
 case "mesPropositions" :
  ControllerCave::$action();
 break;

 // Tache par défaut
 default:
  $action = "caveAccueil";
  ControllerCave::$action();
}
?>
<!-- ----- Fin Router1 -->


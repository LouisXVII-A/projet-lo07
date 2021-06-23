
<!-- ----- debut Router -->
<?php
require ('../controller/ControllerVaccin.php');
require ('../controller/ControllerVin.php');
require ('../controller/ControllerCentre.php');
require ('../controller/ControllerCovid.php');

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
 case "vaccinReadAll" :
 case "vaccinCreate" :
 case "vaccinCreated" :  
 case "selectFiltre" :
  ControllerVaccin::$action($args);

 case "centreReadAll" :
 case "centreCreate" :
 case "centreCreated" :  
 case "selectFiltre" :
  ControllerCentre::$action($args);
     
 case "patientReadAll" :
 case "patientCreate" :
 case "patientCreated" :  
 case "selectFiltre" :
  ControllerPatient::$action($args);
     

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
 case "mesPropositions" :
  ControllerCovid::$action();
 break;

 // Tache par défaut
 default:
  $action = "covidAccueil";
  ControllerCovid::$action();
}
?>
<!-- ----- Fin Router -->



<!-- ----- debut ControllerCovid -->
<?php
require_once '../model/ModelProducteur.php';

class ControllerCovid {
 // --- page d'acceuil
 public static function covidAccueil() {
  include 'config.php';
  $vue = $root . '/app/view/viewCovidAccueil.php';
  if (DEBUG)
   echo ("ControllerVin : covidAccueil : vue = $vue");
  require ($vue);
 }

 public static function mesPropositions() {
    
    // ----- Construction chemin de la vue 
    include 'config.php';
    $vue = $root . '/public/documentation/mesPropositions.php';
    if (DEBUG)
     echo ("ControllerCovid : mesPropositions : vue = $vue");
    require ($vue);
   }

 
}

?>
<!-- ----- fin ControllerCovid -->



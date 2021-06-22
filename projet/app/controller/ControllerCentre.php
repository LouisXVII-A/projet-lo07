<?php
require_once '../model/ModelCentre.php';

class ControllerCentre {
    
    public static function selectFiltre($args) {
   // ----- Construction chemin de la vue
   include 'config.php';
   $vue = $root . '/app/view/gestion des centres/viewSelect.php';
   require ($vue);
  }
 
 public static function getCentre($args) {
    // ----- Construction chemin de la vue
    $filtre = [];

    foreach ($_GET as $key => $value) {
        $filtre[] = $value;
    }
    unset($filtre[0]);
    ModelRecolte::getRecolte($filtre);

   include 'config.php';
   $vue = $root . '/app/view/gestion des centres/viewAll.php';
   require ($vue);
 }

  // --- Liste des centres
    public static function centreReadAll($args) {
        $results = ModelCentre::getAll();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . 'app/view/gestion des centres/viewAll.php';
        if (DEBUG)
        echo ("ControllerCentre : centreReadAll : vue = $vue");
        require ($vue);
    }
 
    // Affiche le formulaire de creation d'un centre
    public static function centreCreate($args) {
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/gestion des centres/viewInsert.php';
        require ($vue);
    }

    // Affiche un formulaire pour récupérer les informations d'un nouveau centre.
    // La clé est gérée par le systeme et pas par l'internaute
    public static function centreCreated($args) {
        // ajouter une validation des informations du formulaire
        $results = ModelCentre::insert(
            htmlspecialchars($_GET['id']), htmlspecialchars($_GET['label']), htmlspecialchars($_GET['doses'])
        );
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/gestion des centres/viewInserted.php';
        require ($vue); 
    }



}


?>
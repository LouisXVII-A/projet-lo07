<?php
require_once '../model/ModelPatient.php';

class ControllerPatient {
    
    public static function selectFiltre($args) {
   // ----- Construction chemin de la vue
   include 'config.php';
   $vue = $root . '/app/view/gestion des patients/viewSelect.php';
   require ($vue);
  }
 
 public static function getpatient($args) {
    // ----- Construction chemin de la vue
    $filtre = [];

    foreach ($_GET as $key => $value) {
        $filtre[] = $value;
    }
    unset($filtre[0]);
    ModelPatient::getpatient($filtre);

   include 'config.php';
   $vue = $root . '/app/view/gestion des patients/viewAll.php';
   require ($vue);
 }

  // --- Liste des patients
    public static function patientReadAll($args) {
        $results = ModelPatient::getAll();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . 'app/view/gestion des patients/viewAll.php';
        if (DEBUG)
        echo ("ControllerPatient : patientReadAll : vue = $vue");
        require ($vue);
    }
 
    // Affiche le formulaire de creation d'un patient
    public static function patientCreate($args) {
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/gestion des patients/viewInsert.php';
        require ($vue);
    }

    // Affiche un formulaire pour récupérer les informations d'un nouveau patient.
    // La clé est gérée par le systeme et pas par l'internaute
    public static function patientCreated($args) {
        // ajouter une validation des informations du formulaire
        $results = ModelPatient::insert(
            htmlspecialchars($_GET['id']), htmlspecialchars($_GET['nom']), htmlspecialchars($_GET['prenom']), htmlspecialchars($_GET['adresse']));
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/gestion des patients/viewInserted.php';
        require ($vue); 
    }



}


?>
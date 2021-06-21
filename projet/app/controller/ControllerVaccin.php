
<!-- ----- debut ControllerVaccin -->
<?php
require_once '../model/ModelVaccin.php';

class ControllerVaccin {
 

 public static function selectFiltre($args) {
   // ----- Construction chemin de la vue
   include 'config.php';
   $vue = $root . '/app/view/gestion des vaccins/viewSelect.php';
   require ($vue);
  }
 
 public static function getVaccin($args) {
    // ----- Construction chemin de la vue
    $filtre = [];

    foreach ($_GET as $key => $value) {
        $filtre[] = $value;
    }
    unset($filtre[0]);
    ModelRecolte::getRecolte($filtre);

   include 'config.php';
   $vue = $root . '/app/view/gestion des vaccins/viewAll.php';
   require ($vue);
 }

  // --- Liste des vins
    public static function vaccinReadAll($args) {
        $results = ModelVaccin::getAll();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . 'app/view/vaccin/viewAll.php';
        if (DEBUG)
        echo ("ControllerVaccin : vaccinReadAll : vue = $vue");
        require ($vue);
    }
 
    // Affiche le formulaire de creation d'un vaccin
    public static function vaccinCreate($args) {
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/vaccin/viewInsert.php';
        require ($vue);
    }

    // Affiche un formulaire pour récupérer les informations d'un nouveau vin.
    // La clé est gérée par le systeme et pas par l'internaute
    public static function vaccinCreated($args) {
        // ajouter une validation des informations du formulaire
        $results = ModelVaccin::insert(
            htmlspecialchars($_GET['id']), htmlspecialchars($_GET['label']), htmlspecialchars($_GET['doses'])
        );
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/vin/viewInserted.php';
        require ($vue); 
    }



}

 
?>
<!-- ----- fin ControllerProducteur -->



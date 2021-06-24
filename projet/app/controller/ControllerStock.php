
<!-- ----- debut ModelStock -->
<?php
require_once '../model/ModelStock.php';

class ControllerStock {  
 

 public static function selectFiltre($args) {
   // ----- Construction chemin de la vue
   include 'config.php';
   $vue = $root . '/app/view/gestion des stocks/viewSelect.php';
   require ($vue);
  }
 
 public static function ModelStock($args) {
    // ----- Construction chemin de la vue
    $filtre = [];

    foreach ($_GET as $key => $value) {
        $filtre[] = $value;
    }
    unset($filtre[0]);
    ModelRecolte::getRecolte($filtre);

   include 'config.php';
   $vue = $root . '/app/view/gestion des stocks/viewAll.php';
   require ($vue);
 }

  // --- Nombre global de doses des centres
    public static function stockReadAll($args) {
        $results = ModelStock::getAll();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . 'app/view/gestion des stocks/viewAll.php';
        if (DEBUG)
        echo ("ModelStock : stockReadAll : vue = $vue");
        require ($vue);
    }
 
    // --- Liste des centres avec le nombre de doses de chaque vaccin
    public static function stockReadAlldetailed($args) {
        $results = ModelStock::getAlldetailed();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . 'app/view/gestion des stocks/viewAlldetailed.php';
        if (DEBUG)
        echo ("ModelStock : stockReadAlldetailed : vue = $vue");
        require ($vue);
    }
    
    // Affiche le formulaire de creation d'un stock
    public static function stockCreate($args) {
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/gestion des stocks/viewInsert.php';
        require ($vue);
    }

    // Affiche un formulaire pour récupérer les informations d'un nouveau stock.
    // La clé est gérée par le systeme et pas par l'internaute
    public static function stockCreated($args) {
        // ajouter une validation des informations du formulaire
        $results = ModelStock::insert( htmlspecialchars($_GET['id']), htmlspecialchars($_GET['label']), htmlspecialchars($_GET['doses']));
        
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/gestion des stocks/viewInserted.php';
        require ($vue); 
    }
    
    //Permet de choisir un Id pour modifier le nombre de stocks
    public static function stockChangeId($args) {
        // on affiche le formulaire et on demande les doses à changer       
        $results = ModelStock::getAll();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/gestion des stocks/viewChange.php';
        require ($vue); 
    }
    
    
    public static function stockChangedId($args) {
        // on affiche le formulaire et on met à jour le tableau mis à jour
        $results = ModelStock::update(htmlspecialchars($_GET['id']), htmlspecialchars($_GET['doses']));
        
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/gestion des stocks/viewChanged.php';
        require ($vue); 
    }



}

 
?>
<!-- ----- fin ControllerProducteur -->



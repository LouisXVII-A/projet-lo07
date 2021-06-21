
<!-- ----- debut ControllerVin -->
<?php
require_once '../model/ModelProducteur.php';

class ControllerProducteur {
 

 // --- Liste des producteurs
 public static function producteurReadAll($args) {
  $results = ModelProducteur::getAll();
  // ----- Construction chemin de la vue 
  include 'config.php';
  $vue = $root . '/app/view/producteur/viewAll.php';
  if (DEBUG)
   echo ("ControllerProducteur : producteurReadAll : vue = $vue");
  require ($vue);
 }

 // Affiche un formulaire pour sélectionner un id qui existe
 public static function producteurReadId($args) {
  $results = ModelProducteur::getAllId();
  $target = $args['target'];
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/producteur/viewId.php';
  require ($vue);
 }

 // Affiche un vin particulier (id)
 public static function producteurReadOne($args) {
  $producteur_id = $_GET['id'];
  $results = ModelProducteur::getOne($producteur_id);

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/producteur/viewAll.php';
  require ($vue);
 }

 // Affiche le formulaire de creation d'un vin
 public static function producteurCreate($args) {
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/producteur/viewInsert.php';
  require ($vue);
 }

 // Affiche un formulaire pour récupérer les informations d'un nouveau vin.
 // La clé est gérée par le systeme et pas par l'internaute
 public static function producteurCreated($args) {
  // ajouter une validation des informations du formulaire
  $results = ModelProducteur::insert(
      htmlspecialchars($_GET['prenom']), htmlspecialchars($_GET['nom']), htmlspecialchars($_GET['region'])
  );
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/producteur/viewInserted.php';
  require ($vue);
 }
 
 // Affiche pour voir toutes les régions sans doublons
 public static function ReadRegions($args) {
    $results = ModelProducteur::getAllRegion();
  
    // ----- Construction chemin de la vue
    include 'config.php';
    $vue = $root . '/app/view/producteur/viewRegions.php';
    require ($vue);
}

// Affiche pour voir toutes les régions sans doublons
public static function ReadNbProducteurByRegion($args) {
    $resultat = ModelProducteur::getProducteurRegion();
    // ----- Construction chemin de la vue
    include 'config.php';
    $vue = $root . '/app/view/producteur/viewNbProducteur.php';
    require ($vue);
}

public static function producteurDeleted($args) {
    // ----- Construction chemin de la vue

    $results = ModelProducteur::delete(
        htmlspecialchars($_GET['id'])
    );

    include 'config.php'; 
    $vue = $root . '/app/view/producteur/viewDeleted.php';
    require ($vue);
}

// Affiche un vin particulier (id)
    public static function vinReadOne($args) {
        $vin_id = $_GET['id'];
        $results = ModelVin::getOne($vin_id);
        
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/vin/viewAll.php';
        require ($vue);
    }

}
?>
<!-- ----- fin ControllerProducteur -->



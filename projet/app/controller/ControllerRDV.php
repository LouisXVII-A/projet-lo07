<?php

class ControllerRDV {
    
    public static function rdvReadId($args) {
        if(DEBUG) echo("ControllerRDV:rdvReadId:begin</br>");
        $results = ModelRDV::getAllId();
        
        $target = $args['target'];
        if(DEBUG) echo ("ControllerRDV:rdvReadId : target = $target </br>");
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/rdv/viewId.php';
        require ($vue);
    }
    
    // --- Nombre global de doses des centres
    public static function rdvReadAll($args) {
        $results = ModelStock::getAll();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . 'app/view/gestion des rdv/viewAll.php';
        if (DEBUG)
        echo ("ModelStock : rdveadAll : vue = $vue");
        require ($vue);
}
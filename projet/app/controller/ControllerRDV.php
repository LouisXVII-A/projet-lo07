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
}
<?php

require_once 'Model.php';

class ModelRDV {
   
    public static function getAllId() {
    try {
      $database = Model::getInstance();
      $query = "select id from patient";
      $statement = $database->prepare($query);
      $statement->execute();
      $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
      return $results;
    } catch (PDOException $e) {
      printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
      return NULL;
    }
    } 
    
}

?>
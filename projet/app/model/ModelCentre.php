<?php
require_once 'Model.php';

class ModelCentre {
    
    private $adresse, $id, $label;
    
    public function __construct($adresse = NULL, $id = NULL, $label = NULL) {
    // valeurs nulles si pas de passage de parametres
    if (!is_null($id)) {
     $this->adresse = $adresse;
     $this->id = $id;
     $this->label = $label;
    }
    }
    
    function setcentre_adresse($adresse) {
    $this->adresse = $adresse;
    }
 
    function setcentre_id($id) {
    $this->id = $id;
    }
    
    function setcentre_label($label) {
    $this->label = $label;
    }
    
    function getcentre_adresse() {
    return $this->adresse;
    }
 
    function getcentre_id() {
    return $this->id;
    }
    
    function getcentre_label() {
    return $this->label;
    }
    
    // retourne une liste des id
    public static function getAllId() {
    try {
      $database = Model::getInstance();
      $query = "select id from centre";
      $statement = $database->prepare($query);
      $statement->execute();
      $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
      return $results;
    } catch (PDOException $e) {
      printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
      return NULL;
    }
    }
    
    public static function getMany($query) {
    try {
    $database = Model::getInstance();
    $statement = $database->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelCentre");
    return $results;
    } catch (PDOException $e) {
    printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
    return NULL;
    }
    }

    public static function getAll() {
    try {
    $database = Model::getInstance();
    $query = "select * from centre";
    $statement = $database->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelCentre");
    return $results;
    } catch (PDOException $e) {
    printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
    return NULL;
    }
    }
 
    public static function getOne($id) {
     try {
      $database = Model::getInstance();
      $query = "select * from centre where id = :id";
      $statement = $database->prepare($query);
      $statement->execute([
        'id' => $id
      ]);
      $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelCentre");
      return $results[0];
     } catch (PDOException $e) {
      printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
      return NULL;
     }
    }

    public static function insert($label, $adresse) {
     try {
      $database = Model::getInstance();

      // recherche de la valeur de la clé = max(id) + 1
      $query = "select max(id) from centre";
      $statement = $database->query($query);
      $tuple = $statement->fetch();
      $id = $tuple['0'];
      $id++;

      // ajout d'un nouveau tuple;
      $query = "insert into centre value (:id, :label, :adresse)";
      $statement = $database->prepare($query);
      $statement->execute([
        'id' => $id,
        'label' => $label,
        'adresse' => $adresse,
      ]);
      return $id;
     } catch (PDOException $e) {
      printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
      return -1;
     }
    }

    public static function update($id,$adresse) {
     try {
      $database = Model::getInstance();
      // Mise à jour d'un tuple;
      $query = "UPDATE centre SET adresse = :adresse WHERE id = :id ";
      $statement = $database->prepare($query);
      $statement->execute([
        'id' => $id,
        'adresse' => $adresse,
      ]);
      return $id;
     } catch (PDOException $e) {
      printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
      return -1;
     }
    }

    public static function delete($id) {
     try {
      $database = Model::getInstance();
      // Suppression d'un tuple
      $query = "DELETE FROM centre WHERE id = :id";
      $statement = $database->prepare($query);
      $statement->execute([
        'id' => $id 
      ]);
      return $statement->rowCount();
     } catch (PDOException $e) {
      printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
      return -1;
     }
    }

}
?>
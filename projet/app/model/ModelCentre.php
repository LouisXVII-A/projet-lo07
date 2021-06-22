<?php
require_once 'Model.php';

class ModelCentre {
    
    private $doses, $id, $label;
    
    public function __construct($doses = NULL, $id = NULL, $label = NULL) {
    // valeurs nulles si pas de passage de parametres
    if (!is_null($id)) {
     $this->doses = $doses;
     $this->id = $id;
     $this->label = $label;
    }
    }
    
    function setcentre_doses($doses) {
    $this->id = $id;
    }
 
    function setcentre_id($id) {
    $this->id = $id;
    }
    
    function setcenter_label($label) {
    $this->id = $id;
    }
    
    function getcentre_doses() {
    return $this->doses;
    }
 
    function getvaccin_id() {
    return $this->id;
    }
    
    function getcenter_label() {
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

    public static function insert($label, $doses) {
     try {
      $database = Model::getInstance();

      // recherche de la valeur de la clé = max(id) + 1
      $query = "select max(id) from centre";
      $statement = $database->query($query);
      $tuple = $statement->fetch();
      $id = $tuple['0'];
      $id++;

      // ajout d'un nouveau tuple;
      $query = "insert into centre value (:id, :label, :doses)";
      $statement = $database->prepare($query);
      $statement->execute([
        'id' => $id,
        'label' => $label,
        'doses' => $doses,
      ]);
      return $id;
     } catch (PDOException $e) {
      printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
      return -1;
     }
    }

    public static function update($id,$doses) {
     try {
      $database = Model::getInstance();
      // Mise à jour d'un tuple;
      $query = "UPDATE centre SET doses = :doses WHERE id = :id ";
      $statement = $database->prepare($query);
      $statement->execute([
        'id' => $id,
        'doses' => $doses,
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
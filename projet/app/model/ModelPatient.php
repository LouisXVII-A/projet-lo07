<?php
require_once 'Model.php';

class ModelPatient {
    
    private $prenom, $nom, $id, $label;
    
    public function __construct($prenom = NULL, $nom = NULL, $id = NULL, $label = NULL) {
    // valeurs nulles si pas de passage de parametres
    if (!is_null($id)) {
     $this->prenom = $prenom;
     $this->nom = $nom;
     $this->id = $id;
     $this->label = $label;
    }
    }
    
    function setpatient_prenom($prenom) {
    $this->prenom = $prenom;
    }
    
    function setpatient_nom($nom) {
    $this->nom = $nom;
    }
 
    function setpatient_id($id) {
    $this->id = $id;
    }
    
    function setpatient_label($label) {
    $this->label = $label;
    }
    
    function getpatient_prenom() {
    return $this->prenom;
    }
    
    function getpatient_nom() {
    return $this->nom;
    }
 
    function getpatient_id() {
    return $this->id;
    }
    
    function getpatient_label() {
    return $this->label;
    }
    
    // retourne une liste des id
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
    
    public static function getMany($query) {
    try {
    $database = Model::getInstance();
    $statement = $database->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPatient");
    return $results;
    } catch (PDOException $e) {
    printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
    return NULL;
    }
    }

    public static function getAll() {
    try {
    $database = Model::getInstance();
    $query = "select * from patient";
    $statement = $database->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPatient");
    return $results;
    } catch (PDOException $e) {
    printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
    return NULL;
    }
    }
 
    public static function getOne($id) {
     try {
      $database = Model::getInstance();
      $query = "select * from patient where id = :id";
      $statement = $database->prepare($query);
      $statement->execute([
        'id' => $id
      ]);
      $results = $statement->fetchAll(PDO::FETCH_CLASS, "Modelpatient");
      return $results[0];
     } catch (PDOException $e) {
      printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
      return NULL;
     }
    }

    public static function insert($id, $label, $prenom, $nom) {
     try {
      $database = Model::getInstance();

      // recherche de la valeur de la clé = max(id) + 1
      $query = "select max(id) from patient";
      $statement = $database->query($query);
      $tuple = $statement->fetch();
      $id = $tuple['0'];
      $id++;

      // ajout d'un nouveau tuple;
      $query = "insert into patient value (:id, :label, :prenom, :nom)";
      $statement = $database->prepare($query);
      $statement->execute([
        'id' => $id,
        'label' => $label,
        'prenom' => $prenom,
        'nom' => $nom,
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
      $query = "DELETE FROM patient WHERE id = :id";
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
<?php
require_once 'Model.php';

class ModelPatient {
    
    private $id, $adresse, $prenom, $nom;
    
    public function __construct($id = NULL, $nom = NULL, $prenom = NULL, $adresse = NULL) {
    // valeurs nulles si pas de passage de parametres
    if (!is_null($id)) {
     $this->id = $id;
     $this->nom = $nom;
     $this->prenom = $prenom;
     $this->adresse = $adresse;
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
    
    function setpatient_adresse($adresse) {
    $this->adresse = $adresse;
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
    
    function getpatient_adresse() {
    return $this->adresse;
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

    public static function insert($id, $nom, $prenom, $adresse) {
     try {
      $database = Model::getInstance();

      // recherche de la valeur de la clé = max(id) + 1
      $query = "select max(id) from patient";
      $statement = $database->query($query);
      $tuple = $statement->fetch();
      $id = $tuple['0'];
      $id++;

      // ajout d'un nouveau tuple;
      $query = "insert into patient value (:id, :nom, :prenom, :adresse)";
      $statement = $database->prepare($query);
      $statement->execute([
        'id' => $id,
        'nom' => $nom,
        'prenom' => $prenom,
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
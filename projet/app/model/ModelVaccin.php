
<!-- ----- debut Modelproducteur -->

<?php
require_once 'Model.php';

class ModelVaccin{
 private $doses, $id, $label;

 // pas possible d'avoir 2 constructeurs
 public function __construct($doses = NULL, $id = NULL, $label = NULL) {
  // valeurs nulles si pas de passage de parametres
  if (!is_null($id)) {
   $this->doses = $doses;
   $this->id = $id;
   $this->label = $label;
  }
 }
 function setvaccin_doses($doses) {
  $this->doses = $doses;
 }
 
 function setvaccin_id($id) {
  $this->id = $id;
 }
 
 function setvaccin_label($label) {
  $this->label = $label;
 }
 
 function getvaccin_id() {
  return $this->id;
 }

 function getvaccin_label() {
  return $this->label;
 }

 function getvaccin_doses() {
  return $this->doses;
 }


 // retourne une liste des id
  public static function getAllId() {
    try {
      $database = Model::getInstance();
      $query = "select id from vaccin";
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
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelVaccin");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function getAll() {
  try {
   $database = Model::getInstance();
   $query = "select * from vaccin";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelVaccin");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function getOne($id) {
  try {
   $database = Model::getInstance();
   $query = "select * from vaccin where id = :id";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $id
   ]);
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelVaccin");
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
   $query = "select max(id) from vaccin";
   $statement = $database->query($query);
   $tuple = $statement->fetch();
   $id = $tuple['0'];
   $id++;

   // ajout d'un nouveau tuple;
   $query = "insert into vaccin value (:id, :label, :doses)";
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
   $query = "UPDATE vaccin SET doses = :doses WHERE id = :id ";
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
   $query = "DELETE FROM vaccin WHERE id = :id";
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
<!-- ----- fin ModelVaccin -->
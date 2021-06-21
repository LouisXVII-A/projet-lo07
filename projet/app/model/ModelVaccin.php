
<!-- ----- debut Modelproducteur -->

<?php
require_once 'Model.php';

class ModelVaccin{
 private $vaccin_doses, $vaccin_id, $vaccin_label;

 // pas possible d'avoir 2 constructeurs
 public function __construct($vaccin_doses = NULL, $vaccin_id = NULL, $vaccin_label = NULL) {
  // valeurs nulles si pas de passage de parametres
  if (!is_null($vaccin_id)) {
   $this->vaccin_doses = $vaccin_doses;
   $this->vaccin_id = $vaccin_id;
   $this->vaccin_label = $vaccin_label;
  }
 }
 function setvaccin_doses($vaccin_doses) {
  $this->vaccin_id = $vaccin_id;
 }
 
 function setvaccin_id($vaccin_id) {
  $this->vaccin_id = $vaccin_id;
 }
 
 function setvaccin_label($vaccin_label) {
  $this->vaccin_id = $vaccin_id;
 }
 
 function getvaccin_doses($vaccin_doses) {
  $this->vaccin_id = $vaccin_id;
 }
 
 function getvaccin_id($vaccin_id) {
  $this->vaccin_id = $vaccin_id;
 }
 
 function getvaccin_label($vaccin_label) {
  $this->vaccin_id = $vaccin_id;
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

 public static function getOne($vaccin_id) {
  try {
   $database = Model::getInstance();
   $query = "select * from vaccin where id = :id";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $vaccin_id
   ]);
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelVaccin");
   return $results[0];
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function insert($vaccin_label, $vaccin_doses) {
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
     'id' => $vaccin_id,
     'label' => $vaccin_label,
     'doses' => $vaccin_doses,
   ]);
   return $id;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return -1;
  }
 }

 public static function update($vaccin_id,$vaccin_doses) {
  try {
   $database = Model::getInstance();
   // Mise à jour d'un tuple;
   $query = "UPDATE vaccin SET doses = :doses WHERE id = :id ";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $vaccin_id,
     'doses' => $vaccin_doses,
   ]);
   return $vaccin_id;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return -1;
  }
 }

 public static function delete($vaccin_id) {
  try {
   $database = Model::getInstance();
   // Suppression d'un tuple
   $query = "DELETE FROM vaccin WHERE id = :id";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $vaccin_id 
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
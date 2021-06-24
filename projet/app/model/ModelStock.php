
<!-- ----- debut Modelproducteur -->

<?php
require_once 'Model.php';

class ModelStock{
 private $centre, $quantitetot, $label;

 // pas possible d'avoir 2 constructeurs
 public function __construct($centre = NULL, $quantitetot = NULL, $label = NULL) {
  // valeurs nulles si pas de passage de parametres
  if (!is_null($id)) {
   $this->quantitetot = $quantitetot;
   $this->centre = $centre;
   $this->label = $label;
  }
 }
 function setstock_quantitetot($quantitetot) {
  $this->quantitetot = $quantitetot;
 }
 
 function setstock_id($centre) {
 $this->centre = $centre;}
 
 function setstock_label($label) {
  $this->label = $label;
 }
 
 function getstock_centre() {
  return $this->centre;
 }

 function getstock_label() {
  return $this->label;
 }

 function getstock_quantitetot() {
  return $this->quantitetot;
 }
 



 /* retourne une liste des id
  public static function getAllId() {
    try {
      $database = Model::getInstance();
      $query = "select id from stock";
      $statement = $database->prepare($query);
      $statement->execute();
      $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
      return $results;
    } catch (PDOException $e) {
      printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
      return NULL;
    }
  }*/

 public static function getMany($query) {
  try {
   $database = Model::getInstance();
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelStock");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function getAll() {
  try {
   $database = Model::getInstance();
   $query = "SELECT centre.label as centre, SUM(stock.quantite) as quantitetot FROM centre,stock WHERE stock.centre_id = centre.id GROUP BY Centre ORDER BY Doses DESC";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelStock");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function getOne($id) {
  try {
   $database = Model::getInstance();
   $query = "select * from stock where id = :id";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $id
   ]);
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelStock");
   return $results[0];
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function insert($id, $label, $doses) {
  try {
      $database = Model::getInstance();
      // recherche de la valeur de la clé = max(id) + 1
      $query = "select max(id) from stock";
      $statement = $database->query($query);
      $tuple = $statement->fetch();
      $id = $tuple['0'];
      $id++;

      // ajout d'un nouveau tuple;
      $query = "insert into stock value (:id, :label, :doses)";
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
   $query = "UPDATE stock SET doses = :doses WHERE id = :id ";
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
   $query = "DELETE FROM stock WHERE id = :id";
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
<!-- ----- fin ModelStock -->
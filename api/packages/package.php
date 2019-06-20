<?php
require_once('../core/common/resource.php');

class Package extends Resource{

    // table name
    private $table_name = "package";

    // object properties
    public $name;
    public $description;
    public $prix;

    function readAllQuery(){ return "SELECT  id, name, description, prix FROM {$this->table_name}" ;}
    function readQuery(){return "SELECT  id, name, description, prix FROM {$this->table_name} WHERE id = :id " ;}
    function createQuery(){return  "INSERT INTO {$this->table_name} SET name=:name, description=:description, prix=:prix";}
    function updateQuery(){return "UPDATE {$this->table_name} SET name=:name, description=:description, prix=:prix WHERE id = :id";}
    function deleteQuery(){return "DELETE FROM {$this->table_name} WHERE id = ?";}

    public function bindParams($stmt){
            // sanitize
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->description=htmlspecialchars(strip_tags($this->description));
        $this->prix=htmlspecialchars(strip_tags($this->prix));
        // bind values
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":prix", $this->prix);
    }
}
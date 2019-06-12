<?php
require_once '../core/common/resource.php';

class Client extends Resource{

    // table name
    private $table_name = "client";

    // object properties
    public $name;
    public $type;
    public $contact_id;

    function readAllQuery(){ return "SELECT  id, name , type, contact_id FROM {$this->table_name}" ;}
    function readQuery(){return "SELECT  id, name , type, contact_id FROM {$this->table_name} WHERE id = :id " ;}
    function createQuery(){return  "INSERT INTO {$this->table_name} SET name=:name, type=:type, contact_id=:contact_id";}
    function updateQuery(){return "UPDATE {$this->table_name} SET name=:name, type=:type, contact_id=:contact_id WHERE id = :id";}
    function deleteQuery(){return "DELETE FROM {$this->table_name} WHERE id = ?";}

    public function bindParams($stmt){
            // sanitize
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->type=htmlspecialchars(strip_tags($this->type));
        $this->contact_id=htmlspecialchars(strip_tags($this->contact_id));
        // bind values
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":type", $this->type, PDO::PARAM_INT);
        $stmt->bindParam(":contact_id", $this->contact_id, PDO::PARAM_INT);
    }
}
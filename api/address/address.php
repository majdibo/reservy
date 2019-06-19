<?php
require_once('../core/common/resource.php');

class Address extends Resource{

    // table name
    private $table_name = "address";

    // object properties
    public $location;

    function readAllQuery(){ return "SELECT  id, location FROM {$this->table_name}" ;}
    function readQuery(){return "SELECT  id, location FROM {$this->table_name} WHERE id = :id " ;}
    function createQuery(){return  "INSERT INTO {$this->table_name} SET location=:location";}
    function updateQuery(){return "UPDATE {$this->table_name} SET location=:location WHERE id = :id";}
    function deleteQuery(){return "DELETE FROM {$this->table_name} WHERE id = ?";}

    public function bindParams($stmt){
            // sanitize
        $this->name=htmlspecialchars(strip_tags($this->location));

        // bind values
        $stmt->bindParam(":location", $this->location);
    }
}
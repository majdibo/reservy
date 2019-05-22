<?php
require_once('../../common/resource.php');

class Contact extends Resource{

    // table name
    private $table_name = "contact";

    // object properties
    public $name;
    public $phone;

    function readAllQuery(){ return "SELECT  id, name , phone FROM " . $this->table_name ;}
    function readQuery(){return "SELECT  id, name , phone FROM " . $this->table_name ." WHERE id = :id " ;}
    function createQuery(){return  "INSERT INTO " . $this->table_name . " SET name=:name, phone=:phone";}
    function updateQuery(){return "UPDATE " . $this->table_name . " SET name = :name, phone = :phone WHERE id = :id";}
    function deleteQuery(){return "DELETE FROM " . $this->table_name . " WHERE id = ?";}

    public function bindParams($stmt){
            // sanitize
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->phone=htmlspecialchars(strip_tags($this->phone));

        // bind values
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":phone", $this->phone);
    }
}
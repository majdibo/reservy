<?php
abstract class Resource{

    // database connection and table name
    private $conn;
    private $table_name;

    // object properties
    public $id;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

abstract function readAllQuery();
abstract function readQuery();
abstract function createQuery();
abstract function updateQuery();
abstract function deleteQuery();
abstract function bindParams($stmt);

    // read resources
function readAll(){

    // select all query
    $query = $this->readAllQuery();

    // prepare query statement
    $stmt = $this->conn->prepare($query);

    // execute query
    $stmt->execute();

    return $stmt;
}

function read($id){

    // select all query
    $query = $this->readQuery();

    // prepare query statement
    $stmt = $this->conn->prepare($query);

    $this->id=htmlspecialchars(strip_tags($id));

 // bind values
    $stmt->bindParam(":id", $this->id);

    // execute query
    $stmt->execute();

    return $stmt;
}

// create resource
function create(){

    // query to insert record
    $query = $this->createQuery();

    // prepare query
    $stmt = $this->conn->prepare($query);

    $this->bindParams($stmt);

    // execute query
    if($stmt->execute()){
        return true;
    }

    return false;

}

// update the resource
function update(){

    // update query
    $query = $this->updateQuery();

    // prepare query statement
    $stmt = $this->conn->prepare($query);

    // sanitize
    $this->id=htmlspecialchars(strip_tags($this->id));

    // bind new values
    $this->bindParams($stmt);
    $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);


    // execute the query
    if($stmt->execute()){
        return true;
    }

    return false;
}

// delete the resource
function delete(){

    // delete query
    $query = $this->deleteQuery();

    // prepare query
    $stmt = $this->conn->prepare($query);

    // sanitize
    $this->id=htmlspecialchars(strip_tags($this->id));

    // bind id of record to delete
    $stmt->bindParam(1, $this->id);

    // execute query
    if($stmt->execute()){
        return true;
    }

    return false;

}
}
?>
<?php
class Contact{

    // database connection and table name
    private $conn;
    private $table_name = "contact";

    // object properties
    public $id;
    public $name;
    public $phone;


    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read resources
function readAll(){

    // select all query
    $query = "SELECT
                id, name , phone
              FROM " . $this->table_name ;

    // prepare query statement
    $stmt = $this->conn->prepare($query);

    // execute query
    $stmt->execute();

    return $stmt;
}

function read($id){

    // select all query
    $query = "SELECT
                id, name , phone
              FROM " . $this->table_name ."
              WHERE id = :id " ;

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
    $query = "INSERT INTO
                " . $this->table_name . "
            SET
                name=:name, phone=:phone";

    // prepare query
    $stmt = $this->conn->prepare($query);

    // sanitize
    $this->name=htmlspecialchars(strip_tags($this->name));
    $this->phone=htmlspecialchars(strip_tags($this->phone));


    // bind values
    $stmt->bindParam(":name", $this->name);
    $stmt->bindParam(":phone", $this->phone);


    // execute query
    if($stmt->execute()){
        return true;
    }

    return false;

}

// update the resource
function update(){

    // update query
    $query = "UPDATE " . $this->table_name . " SET name = :name, phone = :phone WHERE id = :id";

    // prepare query statement
    $stmt = $this->conn->prepare($query);

    // sanitize
    $this->name=htmlspecialchars(strip_tags($this->name));
    $this->phone=htmlspecialchars(strip_tags($this->phone));
    $this->id=htmlspecialchars(strip_tags($this->id));

    // bind new values
    $stmt->bindParam(':name', $this->name);
    $stmt->bindParam(':phone', $this->phone, PDO::PARAM_INT);
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
    $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

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
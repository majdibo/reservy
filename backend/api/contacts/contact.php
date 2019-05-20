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

    // read products
function read(){

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

// create product
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
}
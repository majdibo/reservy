<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/api/core/common/resource.php');

class Bill extends Resource{

    // table name
    private $table_name = "bill";

    // object properties
    public $amount;
    public $paid_amount;

    function readAllQuery(){ return "SELECT  id, amount, paid_amount FROM {$this->table_name}" ;}
    function readQuery(){return "SELECT  id, amount, paid_amount FROM {$this->table_name} WHERE id = :id " ;}
    function createQuery(){return  "INSERT INTO {$this->table_name} SET amount=:amount, paid_amount=:paid_amount";}
    function updateQuery(){return "UPDATE {$this->table_name} SET  amount=:amount, paid_amount=:paid_amount WHERE id = :id";}
    function deleteQuery(){return "DELETE FROM {$this->table_name} WHERE id = ?";}

    public function bindParams($stmt){
            // sanitize
        $this->amount=htmlspecialchars(strip_tags($this->amount));
        $this->paid_amount=htmlspecialchars(strip_tags($this->paid_amount));

        // bind values
        $stmt->bindParam(":amount", $this->amount);
        $stmt->bindParam(":paid_amount", $this->paid_amount);
    }
}
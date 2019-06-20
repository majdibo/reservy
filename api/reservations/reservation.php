<?php
require_once('../core/common/resource.php');

class Reservation extends Resource{

    // table name
    private $table_name = "reservation";

    // object properties
    public $address_id;
    public $client_id;
    public $package_id;
    public $bill_id;
    public $status;
    public $start_date;
    public $end_date;
    public $note;

    function readAllQuery(){ return "SELECT  id, address_id, client_id, package_id, bill_id, status, start_date, end_date, note
                                     FROM {$this->table_name}" ;}

    function readQuery(){return "SELECT  id, address_id, client_id, package_id, bill_id, status, start_date, end_date, note
                                 FROM {$this->table_name} WHERE id = :id " ;}

    function createQuery(){return  "INSERT INTO {$this->table_name}
                                    SET address_id=:address_id,
                                        client_id=:client_id,
                                        package_id=:package_id,
                                        bill_id=:bill_id,
                                        status=:status,
                                        start_date=:start_date,
                                        end_date=:end_date,
                                        note=:note";}

    function updateQuery(){return "UPDATE {$this->table_name}
                                   SET address_id=:address_id,
                                       client_id=:client_id,
                                       package_id=:package_id,
                                       bill_id=:bill_id,
                                       status=:status,
                                       start_date=:start_date,
                                       end_date=:end_date,
                                       note=:note
                                       WHERE id = :id";}

    function deleteQuery(){return "DELETE FROM {$this->table_name} WHERE id = ?";}

    public function bindParams($stmt){
            // sanitize
        $this->address_id=htmlspecialchars(strip_tags($this->address_id));
        $this->client_id=htmlspecialchars(strip_tags($this->client_id));
        $this->package_id=htmlspecialchars(strip_tags($this->package_id));
        $this->bill_id=htmlspecialchars(strip_tags($this->bill_id));
        $this->status=htmlspecialchars(strip_tags($this->status));
        $this->start_date=htmlspecialchars(strip_tags($this->start_date));
        $this->end_date=htmlspecialchars(strip_tags($this->end_date));
        $this->note=htmlspecialchars(strip_tags($this->note));

        // bind values
        $stmt->bindParam(":address_id", $this->address_id);
        $stmt->bindParam(":client_id", $this->client_id);
        $stmt->bindParam(":package_id", $this->package_id);
        $stmt->bindParam(":bill_id", $this->bill_id);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":start_date", $this->start_date);
        $stmt->bindParam(":end_date", $this->end_date);
        $stmt->bindParam(":note", $this->note);
    }
}
<?php
class Database{

    // specify your own database credentials
    private $host = "remotemysql.com";
    private $db_name = "GrLfE2lGIK";
    private $username = "GrLfE2lGIK";
    private $password = "PIP6xT7I3g";
    public $conn;

    // get the database connection
    public function getConnection(){

        $this->conn = null;

        try{
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password,
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING)
            );

            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>
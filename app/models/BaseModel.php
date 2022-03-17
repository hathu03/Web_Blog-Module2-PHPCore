<?php

include_once "DBConnect.php";
class BaseModel
{
    protected $dbConnect;
    protected $table;
    public function __construct()
    {
        $db = new DBConnect();
        $this->dbConnect = $db->connect();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM $this->table";
        $stmt = $this->dbConnect->query($sql);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id =".$id;
        $stmt = $this->dbConnect->query($sql);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function deleteById($id)
    {
        $sql = "DELETE FROM $this->table WHERE id=".$id;
        $stmt = $this->dbConnect->prepare($sql);
        $stmt->execute();
    }
}
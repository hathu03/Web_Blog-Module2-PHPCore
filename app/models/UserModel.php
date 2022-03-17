<?php
include_once "BaseModel.php";
class UserModel extends BaseModel
{
    protected $table = "users";

    public function store($request)
    {
        $sql = "INSERT INTO $this->table (name, email, password, birthday, country) VALUE (?,?,?,?,?)";
        $stmt = $this->dbConnect->prepare($sql);
        $stmt->bindParam(1,$request["name"]);
        $stmt->bindParam(2,$request["email"]);
        $stmt->bindParam(3,$request["password"]);
        $stmt->bindParam(4,$request["birthday"]);
        $stmt->bindParam(5,$request["country"]);
        $stmt->execute();
    }
    public function update($request)
    {
        $sql = "UPDATE $this->table SET name = ?, email = ?, password = ?, birthday = ?, country = ? WHERE id = ?";
        $stmt = $this->dbConnect->prepare($sql);
        $stmt->bindParam(1,$request["name"]);
        $stmt->bindParam(2,$request["email"]);
        $stmt->bindParam(3,$request["password"]);
        $stmt->bindParam(4,$request["birthday"]);
        $stmt->bindParam(5,$request["country"]);
        $stmt->bindParam(6,$request["id"]);
        $stmt->execute();
    }

    public function checkLogin($email, $password)
    {
        $sql = "SELECT * FROM $this->table WHERE email = ? and password = ?";
        $stmt = $this->dbConnect->prepare($sql);
        $stmt->bindParam(1, $email);
        $stmt->bindParam(2, $password);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
    public function getByEmail($email)
    {
        $sql = "SELECT * FROM $this->table WHERE email =?";
        $stmt = $this->dbConnect->prepare($sql);
        $stmt->bindParam(1, $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
}
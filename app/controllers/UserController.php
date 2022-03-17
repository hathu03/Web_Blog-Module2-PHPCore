<?php
include_once "app/models/UserModel.php";
class UserController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function showAll()
    {
        $users = $this->userModel->getAll();
        include_once "app/views/user/list.php";
    }

    public function create()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            include_once "app/views/user/create.php";
        }else {
            try {
                $this->userModel->store($_REQUEST);
                header("Location:index.php");
            }catch (PDOException $e) {
                echo ($e->getMessage());
            }

        }
    }

    public function delete()
    {
        if (isset($_REQUEST["id"])){
            $this->userModel->deleteById($_REQUEST["id"]);
            header("Location:index.php");
        }else {
            header("Location:index.php");
        }
    }

    public function edit()
    {
        if (isset($_REQUEST["id"])) {
            $user = $this->userModel->getById($_REQUEST["id"]);
            include_once "app/views/user/update.php";
        }
    }

    public function update()
    {
        if (isset($_REQUEST["id"])) {
            $this->userModel->update($_REQUEST);
            header("Location:index.php?page=user-list");
        }
    }
}
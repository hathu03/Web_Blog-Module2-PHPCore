<?php
include_once "app/models/UserModel.php";
class AuthController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function showFormLogin()
    {
        if (isset($_SESSION["user"])) {
            header("Location:index.php?page=user-list");
        }
        include_once "app/views/auth/login.php";
    }

    public function login($request)
    {
        $email = $request["email"];
        $password = $request["password"];
        if ($this->userModel->checkLogin($email, $password)) {
            $user = $this->userModel->getByEmail($email);
            $_SESSION["user"] = $user;
            header("Location:index.php?page=user-list");
        }else{
            header("Location:index.php?page=user-login");
        }
    }

    public function logout()
    {
        session_destroy();
        header("Location:index.php?page=login");
    }
}
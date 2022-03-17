<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
session_start();
include_once "app/controllers/UserController.php";
include_once "app/controllers/AuthController.php";
$userController = new UserController();
$authController = new AuthController();
$page = isset($_GET['page']) ? $_GET["page"]:null;
switch ($page){
    case "user-list":
        $userController->showAll();
        break;
    case "user-create":
        $userController->create();
        break;
    case "user-delete":
        $userController->delete();
        break;
    case "user-update":
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $userController->edit();
        }else{
            $userController->update();
        }
        break;
    case "login":
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $authController->showFormLogin();
        }else {
            $authController->login($_REQUEST);
        }
        break;
    case "logou":
        $authController->logout();
        break;
    default:
        header("Location:index.php?page=login");
}
?>
</body>
</html>
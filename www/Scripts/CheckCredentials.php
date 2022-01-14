<?php
include('../Utils/AutoLoader.php');
//$_SESSION['error'];

$login = $_POST['login'];
$password = $_POST['password'];
$userController = new UserController();

if($userController->isSubmite($login, $password))
{

    session_start();
    $_SESSION["suid"] = session_id();
    $_SESSION["user"] = $login;
    header('Location: ../Views/User/ModificationReussie.php');
    exit();
}
else
{
    header('Location: ../Views/User/Login.php');
    exit();
}
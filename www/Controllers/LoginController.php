<?php
include('../Utils/AutoLoader.php');
//$_SESSION['error'];

$login = $_POST['login'];
$password = $_POST['password'];
$userControlller = new UserController();

if($userControlller->isSubmite($login, $password))
{

    session_start();
    session_reset();
    $_SESSION["suid"] = session_id();
    header('Location: ../Views/User/ModificationReussie.php');
    exit();
}
else
{
    header('Location: ../Views/User/LoginView.php');
    exit();
}
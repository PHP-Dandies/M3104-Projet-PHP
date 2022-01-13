<?php
include('../Utils/AutoLoader.php');
//$_SESSION['error'];

$login = $_POST['login'];
$password = $_POST['password'];
$userControlller = new UserController();

if($userControlller->isSubmite($login, $password))
{

    session_start();
//  $_SESSION["id"] = session_id();
    echo 'Autehntification réussite';
}
else
{
    echo'Raté';
}
<?php
include 'UserController.php';
$login = $_POST['login'];
$password = $_POST['password'];
$userControlller = new UserController();

if($userControlller->isSubmite($login, $password))
{
    echo 'Autehntification réussite';
}
else
{
    echo 'authentification échoué';
}
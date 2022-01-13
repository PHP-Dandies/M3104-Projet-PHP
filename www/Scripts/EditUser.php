<?php

include ('../Utils/Database.php');

$id = $_GET['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

if ($username !== '' || $password !== '' || $role !== '') {
    if ($username !== '') {
        $query = "UPDATE `USER` SET USERNAME='$username' WHERE USER_ID=$id";
        Database::executeUpdate($query);
    }
    if ($password !== '') {
        $query = "UPDATE USER SET PASSWORD='$password' WHERE USER_ID=$id";
        Database::executeUpdate($query);
    }
    if ($role !== '') {
        $query = "UPDATE USER SET ROLE='$role' WHERE USER_ID=$id";
        Database::executeUpdate($query);
    }
}

header('Location: ../users');
exit;
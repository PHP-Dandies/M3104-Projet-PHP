<?php
include '../Utils/Database.php';

$username = bin2hex(random_bytes(10));
$password = bin2hex(random_bytes(15));

Database::executeUpdate("INSERT INTO USER(USERNAME, PASSWORD) VALUES ('$username', '$password');");

header('Location: ../users');
exit();
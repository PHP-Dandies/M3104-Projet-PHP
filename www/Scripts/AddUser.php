<?php
include '../Utils/Database.php';

$username = bin2hex(random_bytes(10));
$password = password_hash(bin2hex(random_bytes(15), PASSWORD_DEFAULT));

Database::executeUpdate("INSERT INTO USER(USERNAME, PASSWORD) VALUES ('$username', '$password';");

header('Location: ../users');
exit();
<?php
include 'Utils/Database.php';

$password = password_hash('moi', PASSWORD_DEFAULT);
//var_dump($password);
Database::executeUpdate("INSERT INTO USER(USERNAME, PASSWORD) VALUES('ab', '$2y$10$.jB/fnQaqHO.5K47hrGXbuEtec/H1PrzlzU8LfopBOKBVbbMr7bWi');");
echo'fait';
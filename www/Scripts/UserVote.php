<?php

// une fois les sessions faites, récupérer l'id de l'utilisateur dans le session et lui enlever les points si il en a

$id = $_GET["id"];
$pts = $_POST["pts"];

Database::executeUpdate("UPDATE IDEA SET TOTAL_POINTS = TOTAL_POINTS + '$pts' WHERE IDEA_ID = $id");

echo('done');
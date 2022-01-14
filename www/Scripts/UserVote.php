<?php

// une fois les sessions faites, récupérer l'id de l'utilisateur dans le session et lui enlever les points si il en a

$id = $_GET["id"];
$userId = $_GET["user_id"];
$pts = $_POST["pts"];

Database::executeUpdate("UPDATE IDEA SET TOTAL_POINTS = TOTAL_POINTS + '$pts' WHERE IDEA_ID = $id");

if(Database::executeUpdate("UPDATE USER SET AVAILABLE_POINTS = AVAILABLE_POINTS - '$pts' WHERE IDEA_ID = $id"))
{
    Database::executeUpdate("UPDATE USER SET AVAILABLE_POINTS = AVAILABLE_POINTS - '$pts' WHERE USER_ID = $userId");
}


echo('done');
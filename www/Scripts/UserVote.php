<?php
include '../Utils/Database.php';
include('../Utils/AutoLoader.php');
// une fois les sessions faites, récupérer l'id de l'utilisateur dans le session et lui enlever les points si il en a
session_start();

die();
if(!isset($_SESSION["user"]))
{
    $id = $_GET["id"];
    $pts = $_POST["pts"];

    Database::executeUpdate("UPDATE IDEA SET TOTAL_POINTS = TOTAL_POINTS + '$pts' WHERE IDEA_ID = $id");

    var_dump(Database::executeUpdate("UPDATE USER SET POINTS = POINTS - '$pts' WHERE USERNAME = $_SESSION['user']"));
    die();

    if(Database::executeUpdate("UPDATE USER SET POINTS = POINTS - '$pts' WHERE IDEA_ID = $_SESSION['user']") != 0)
    {
        Database::executeUpdate("UPDATE USER SET AVAILABLE_POINTS = AVAILABLE_POINTS - '$pts' WHERE USER_ID = $userId");
    }
    echo('done');
}
else
{
    die('Erreur d\'authentification');
}
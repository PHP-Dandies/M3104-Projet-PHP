<?php

include('../Utils/Database.php');

$title = $_POST['TITLE'];
$description = $_POST['DESCRIPTION'];
$goal = $_POST['GOAL'];
$picture = $_POST['TITLE'];
$user_id = $_POST['USER_ID'];
$campaign_id = $_POST['CAMPAIGN_ID'];

$query = "INSERT INTO IDEA(TITLE, DESCRIPTION, GOAL, PICTURE, USER_ID, CAMPAIGN_ID) "
    . "VALUES('$title', '$description', '$goal', '$picture', '$user_id', '$campaign_id')";

try {
    Database::executeUpdate($query);
    echo 'reussite';
} catch (Exception $e) {
    echo $e->getMessage();
    die();
}
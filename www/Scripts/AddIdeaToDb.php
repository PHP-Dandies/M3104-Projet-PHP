<?php
$doc_root = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);
include('../Utils/Database.php');

$title = $_POST['TITLE'];
$description = $_POST['DESCRIPTION'];
$goal = $_POST['GOAL'];
$picture = $_POST['IMAGES'];
$user_id = $_POST['USER_ID'];
$campaign_id = $_POST['CAMPAIGN_ID'];

// Where the file is going to be placed
$file = time().'.'.substr(strrchr($_FILES['IMAGES']['name'], '.'), 1);
$rel_path = '/images/'.$file;
$target_path = $doc_root.$rel_path;

if(!move_uploaded_file($_FILES['IMAGES']['tmp_name'], $target_path)) {
    header("HTTP/1.1 500 Internal Server Error");
    die();
}

$query = "INSERT INTO IDEA(TITLE, DESCRIPTION, GOAL, PICTURE, USER_ID, CAMPAIGN_ID) "
    . "VALUES('$title', '$description', '$goal', '$rel_path', '$user_id', '$campaign_id')";

try {
    Database::executeUpdate($query);
    header("Location: /orga/ideas")
} catch (Exception $e) {
    echo $e->getMessage();
    die();
}

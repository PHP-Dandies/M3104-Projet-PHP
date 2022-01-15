<?php

include('../Utils/Database.php');

$beg_date = $_POST['datedeb'];
$end_date = $_POST['datefin'];
$title = $_POST['title'];
$nbPoints = $_POST['points'];

    $query = "INSERT INTO `campaign` (`CAMPAIGN_ID`, `BEG_DATE`, `END_DATE`, `TITLE`)"
        . " VALUES (NULL, '$beg_date', '$end_date', '$title');";
    echo $query;
    Database::executeUpdate($query);
    echo 'done';



$query = "UPDATE `user` SET AVAILABLE_POINTS = '$nbPoints' WHERE ROLE='voter'";

Database::executeUpdate($query);
echo 'c bon';

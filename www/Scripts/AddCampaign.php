<?php

include('../Utils/Database.php');

$beg_date = $_POST['datedeb'];
$end_date = $_POST['datefin'];
$title = $_POST['title'];

    $query = "INSERT INTO `campaign` (`CAMPAIGN_ID`, `BEG_DATE`, `END_DATE`, `TITLE`)"
        . " VALUES (NULL, '$beg_date', '$end_date', '$title');";
    echo $query;
    Database::executeUpdate($query);
    echo 'done';

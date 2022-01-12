<?php

include('../Utils/Database.php');

$beg_date = $_POST['BEG_DATE'];
$end_date = $_POST['END_DATE'];
$title = $_POST['TITLE'];

try {
    $query = "INSERT INTO `campaign` (`CAMPAIGN_ID`, `BEG_DATE`, `END_DATE`, `TITLE`)"
        . " VALUES (NULL, '$beg_date', '$end_date', '$title');";
    echo $query;
    Database::executeUpdate($query);
    echo 'done';
} catch(Exception $e) {
    echo $e->getMessage();
    die();
}
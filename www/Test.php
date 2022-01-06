<?php
include 'Utils/database.php';
$query = 'SELECT * FROM IDEA';
try {
    $Result = database::execute_query($query);
}
catch(Exception $E)
{
    echo $E->getMessage();
    die();
}
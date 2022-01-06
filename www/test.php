<?php

include("Utils/database.php");

// $query = 'INSERT INTO \'test\' (\'ID\', \'intc\', \'charc\') VALUES (NULL, \'3\', \'b\')';

$query = 'SELECT * FROM `test`' ;
try {
    echo 'trying to select * <br/>';

    $result_array = database::execute_query($query);

    foreach ($result_array as $array) {
        foreach ($array as $key => $value) {
            echo $key . '=>' . $value . '<br/>';
        }
        echo '<br/>';
    }

    echo 'done !<br/>';

} catch (Exception $e) {
    echo $e->getMessage();
    die();
}

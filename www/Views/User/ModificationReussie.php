<?php

session_start();
if(!isset($_SESSION["suid"]))
{
    var_dump($_SESSION["suid"]);
    die('Rentrer sans session');
}
else
{
    var_dump(!isset($_SESSION["suid"]));
    echo 'rentrer avec session';
}

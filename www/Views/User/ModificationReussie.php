<?php

session_start();
if(!isset($_SESSION["suid"]))
{
    die('Rentrer sans session');
}
else
{
    echo 'rentrer avec session';
}

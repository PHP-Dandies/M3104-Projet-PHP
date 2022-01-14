<?php

session_start();
if(!isset($_SESSION["user"]))
{
    die('Rentrer sans session');
}
else
{
    echo 'rentrer avec session';
}

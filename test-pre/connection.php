<?php

$hostName = 'localhost';

$userName = 'root';

$password = '';

$dbName = 'my_db';

$dbcon = mysqli_connect($hostName,$userName,$password,"$dbName");

if(!$dbcon)
{
    die('could not connect');
}


?>
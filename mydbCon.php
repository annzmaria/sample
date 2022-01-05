<?php

    $hName='localhost'; // host name

    $uName='root';   // database user name

    $password='';   // database password

    $dbName = "my_db"; // database name

    $dbCon = mysqli_connect($hName,$uName,$password,"$dbName");

      if(!$dbCon){
          die('Could not Connect MySql Server:' .mysql_error());
      }
?>

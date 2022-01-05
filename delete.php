<?php


include 'mydbCon.php';

$query = "DELETE FROM customers WHERE custId='" . $_GET["custId"] . "'"; // Delete data from the table customers using id

 if (mysqli_query($dbCon, $query)) {
    $msg = 3;
 } else {
    $msg = 4;
 }

header ("Location: customers.php?msg=".$msg."");


?>
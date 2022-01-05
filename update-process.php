<?php

if(count($_POST)>0){

include 'mydbCon.php';

$query = "UPDATE customers set custId='" . $_POST['custId'] . "', fname='" . $_POST['fname'] . "', lname='" . $_POST['lname'] . "', email='" . $_POST['email'] . "' WHERE custId='" . $_POST['custId'] . "'"; // update form data from the database

 if (mysqli_query($dbCon, $query)) {
    $msg = 2;
 } else {
    $msg = 4;
 }

}

header ("Location: customers.php?msg=".$msg."");

?>
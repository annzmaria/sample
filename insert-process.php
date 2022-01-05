<?php

if(count($_POST)>0)
{    
     include 'mydbCon.php';

     $fname = $_POST['fname'];
     $lname = $_POST['lname'];
     $email = $_POST['email'];
 
     $query = "INSERT INTO customers (fname,lname,email)
     VALUES ('$fname','$lname','$email')";
 
     if (mysqli_query($dbCon, $query)) {
        $msg = 1;
     } else {
        $msg = 4;
     }

}
  header ("Location: customers.php?msg=".$msg."");
?>
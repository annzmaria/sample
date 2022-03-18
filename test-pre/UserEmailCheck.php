<?php  include("connection.php"); ?>
<?php 

$str = $_POST["str"];
$check_query="select * from users where email='$str'";  
$run_query=mysqli_query($dbcon,$check_query);
$rowcount=mysqli_num_rows($run_query);
if($rowcount>0)  { echo 1; }
else{ echo 2; }

?>
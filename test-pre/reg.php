<html>

<head lang="en">
    <meta charset="UTF-8">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <title>Registration</title>
</head>
<style>
.login-panel {
    margin-top: 150px;
}
</style>

<body>

    <div class="container">

        <div class="row">

            <div class="col-md-4 col-md-offset-4">

                <div class="login-panel panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Registration</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="reg.php" autocomplete="off" id="login-form">
                            <fieldset>
                                <div class="form-group">
                                     <div class="user_txt" id="user_msg" style="display:none;"></div>
                                    <input class="form-control" placeholder="Username" id="user_name" name="user_name" type="text" onchange="CheckUser(this.value);" autofocus  required>
                                </div>

                                <div class="form-group">
                                    <div class="user_txt" id="user_email_msg" style="display:none;"></div>
                                    <input class="form-control" placeholder="E-mail" id="user_email"  name="user_email" type="email" onchange="CheckUserEmail(this.value);" required> 
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="current_pwd" type="password" required>
                                </div>


                                <input class="btn btn-lg btn-success btn-block" type="submit" value="register"name="register">

                            </fieldset>
                        </form>
                        <center><b>Already registered ?</b> <br></b><a href="login.php">Login here</a></center>
                        <!--for centered text-->
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

<?php  
  
include("connection.php");

if(isset($_POST['register']))  
{  
    $user_name=$_POST['user_name'];
    $user_pass=$_POST['current_pwd'];
    $user_email=$_POST['user_email'];
  
  
    if($user_name=='')  
    {   
	echo"<script>alert('Please enter the name')</script>";  
	exit(); 
    }  
  
    if($user_pass=='')  
    {  
	echo"<script>alert('Please enter the password')</script>";  
	exit();  
    }  
  
    if($user_email=='')  
    {  
	echo"<script>alert('Please enter the email')</script>";  
    exit();  
    }  
 
    $check_email_query="select * from users WHERE email='$user_email' || name='$user_name'";  
    $run_query=mysqli_query($dbcon,$check_email_query);  
  
    if(mysqli_num_rows($run_query)>0)  
    {  
		
	echo "<script>alert('Email Id or name is already exist in our database, Please try another one!')</script>";  
	exit();  

    }  
    	
		$insert_user="insert into users (name,password,email) VALUE ('$user_name','$user_pass','$user_email')";  
        
		if(mysqli_query($dbcon,$insert_user))  
		{
            session_start();  
            $_SESSION['email'] = $user_email;
        //echo "<script>alert('User Registration sucess')</script>";  
		echo"<script>window.open('index.php','_self')</script>";  
		}  
		
	
} 


?>

<script>
function CheckUser(str){
	$.ajax({
     type: "POST",
     url: 'UserNameCheck.php',
     data: "str="+str, // appears as $_GET['id'] @ your backend side
     success: function(data) {
         alert(data);
         if(data==1){
			 $("#user_msg").show();
			 $("#user_msg").html("Username already exist!.");
			 $("#user_msg").css('color', 'red');
			 $("#user_name").val('');
			}
			else{
			 $("#user_msg").show();
			 $("#user_msg").html("Available!.");
			 $("#user_msg").css('color', 'green');
			}
     }

   });
}

function CheckUserEmail(str){
	//alert(str);
	$.ajax({
     type: "POST",
     url: 'UserEmailCheck.php',
     data: "str="+str, 
     success: function(data) {
         //alert(data);
         if(data==1){
			 $("#user_email_msg").show();
			 $("#user_email_msg").html("Email id already exist!.");
			 $("#user_email_msg").css('color', 'red');
			 $("#user_email").val('');
			}
			else{
			 $("#user_email_msg").show();
			 $("#user_email_msg").html("Available!.");
			 $("#user_email_msg").css('color', 'green');
			}
     }

   });
}

</script>
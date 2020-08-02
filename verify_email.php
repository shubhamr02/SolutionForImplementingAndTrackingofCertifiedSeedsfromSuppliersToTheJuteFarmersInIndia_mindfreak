<?php
include_once 'config/database.php';
if(isset($_POST['submit']))
{
    $email = $_POST['email'];
    $result = mysqli_query($conn,"SELECT * FROM supplier where email='" . $_POST['email'] . "'");
    $row = mysqli_fetch_assoc($result);
  $user_email=$row['email'];
  $token=$row['token'];
  $type=$row['type'];
  if($email==$user_email && $type!='Officail') 
  {
  	  $to_email = $user_email;
      $subject = "Password Reset Link";
      $body = "http://localhost/SIH/Main/resetpass.php?t=$token&u=$user_email";
      $headers = "From: deepaksharma7316@gmail.com";
  	   if (mail($to_email, $subject, $body, $headers)) 
  	   {
  	  echo '<script>alert("Password Reset link is sent to your registered Email-Id")</script>';
  	   }
   		else{
   		echo '<script>alert("Password Reset link cannot be sent to your registered Email-Id")</script>';
   		}
	}
   else
   {
      echo '<script>alert("Email-Id is Not Registered with account")</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Email Verification </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="lvendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="lvendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="lvendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="lvendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="lvendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="lvendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/lcss/util.css">
	<link rel="stylesheet" type="text/css" href="css/lcss/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				<form class="login100-form validate-form flex-sb flex-w" method="post" action="" enctype="multipart/form-data">
					<span class="login100-form-title p-b-32">
						Email Verification
					</span>

					<span class="txt1 p-b-11">
						Email Id
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Email Id is required">
						<input class="input100" type="email" name="email" placeholder="Enter your Registered Email-Id" required>
						<span class="focus-input100"></span>
					</div>
					
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="submit" id="submit">
							Verify
						</button>

						</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="lvendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="lvendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="lvendor/bootstrap/js/popper.js"></script>
	<script src="lvendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="lvendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="lvendor/daterangepicker/moment.min.js"></script>
	<script src="lvendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="lvendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/ljs/main.js"></script>
	
</body>
</html>
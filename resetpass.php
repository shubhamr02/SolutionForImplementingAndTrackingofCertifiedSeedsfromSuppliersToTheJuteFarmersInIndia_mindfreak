<?php
include_once 'database.php';
 if(isset($_GET['t']) && isset($_GET['u'])){
    $token = $_GET['t'];
    $email = $_GET['u'];
$result = mysqli_query($conn,"SELECT * FROM supplier where email='$email'AND token='$token'");
 $row = mysqli_fetch_assoc($result);
 $user_token=$row['token'];
 
 $new_token1 = openssl_random_pseudo_bytes(16);
 
//Convert the binary data into hexadecimal representation.
	$newtoken = bin2hex($new_token1);

if($user_token==$token)
{	
	if(isset($_POST['submit']))
	{
		$pass1=$_POST['password1'];
		$pass2=$_POST['password2'];

	if($pass1==$pass2)
	{
		$password=md5($pass1);
		$result="UPDATE supplier SET password='$password',token='$newtoken',updated=now() where email='$email'";
		if ($conn->query($result) === TRUE) 
		{
  			echo '<script>alert("Email-Id is Not Registered with account")</script>';
  			header("location: ./login.php");
		}
	 	else 
		{
  			echo "Error: " . $result . "<br>" . $conn->error;
		}
	}
	else
	{
		echo '<script>alert("Password does not matched")</script>';
	}
}
   
}else
{
	echo "Link Expired..";
	?>
	<br/>
	<b>
		<a href="sendprlink.php" style="font-size: 18px;color: red;">Send Password Reset link Again</a></b>

	<?php
}
}


 ?>  

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Change Password </title>
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
						Reset Password
					</span>

					
					
					<span class="txt1 p-b-11">
						Password
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
						<!--<span class="btn-show-pass" toggle="#password-field" >
							<i class="fa fa-eye"></i>
						</span> --> 
						<input class="input100" type="password" name="password1" id="password1" placeholder="Password" required>
						<span class="focus-input100"></span>
					</div>
					<span class="txt1 p-b-11">
						Confirm Password
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate = "Confirm Password is required">
						<!--<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>-->
						<input class="input100" type="password" name="password2" id="password2" placeholder=" Confirm Password" required>
						<span class="focus-input100"></span>
					</div>
					
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" id="submit" name="submit">
							Reset
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
	<script src="js/main/ljs/.js"></script>
	<script>
$("body").on('click', '.toggle-password', function() {
  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $("#pass_log_id");
  if (input.attr("type") === "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }

});
</script>
</body>
</html>
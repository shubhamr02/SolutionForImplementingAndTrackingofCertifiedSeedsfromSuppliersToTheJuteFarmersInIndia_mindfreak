<?php
session_start();
include_once 'config/database.php';
if(isset($_POST['submit']))
{
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $result = mysqli_query($conn,"SELECT * FROM supplier where email='" . $_POST['email'] . "'");
    $row = mysqli_fetch_assoc($result);
  $user_email=$row['email'];
  $user_password=$row['password'];
  $user_status=$row['status'];

  $type=$row['type'];
  if($email===$user_email && $password===$user_password) 
  {

      $_SESSION['user']=$email;
      if($type==='Official')
      {
        header("Location: dashboard.php");
      }
      else
      {
      header("Location: home.php");
    }
  }
  else
  {
     echo '<script>alert("Invalid Email-Id and Password")</script>';

  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>NJB Login </title>
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
						Login
					</span>

					<span class="txt1 p-b-11">
						Email Id
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Email Id is required">
						<input class="input100" type="email" name="email" id="email" placeholder="Email" required>
						<span class="focus-input100"></span>
					</div>
					
					<span class="txt1 p-b-11">
						Password
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
						<!--<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>-->
						<input class="input100" type="password" name="password" id="password" placeholder="Password" required>
						<span class="focus-input100"></span>
						<!--  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" -->
					</div>
					
					<div class="flex-sb-m w-full p-b-48">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
							<a href="./verify_email.php" class="txt3">
								Forgot Password?
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="submit" id="submit">
							Login
						</button>
					</div>

				</form>
				<div>
						Don't have an account 	<a href="./registration.php" class="txt3">
								Register Here
							</a>
						</div>
				
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
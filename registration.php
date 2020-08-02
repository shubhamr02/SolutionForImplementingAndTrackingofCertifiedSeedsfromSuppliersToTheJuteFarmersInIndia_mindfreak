<?php
session_start();
include_once 'config/database.php';
if(isset($_POST['submit']))
{
    $org = $_POST['org'];
    $type = $_POST['type'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $fax = $_POST['fax'];
    $license = $_POST['license'];
    $aadhaar = $_POST['aadhaar'];
    $phone = $_POST['phone'];
    $contactp = $_POST['contactp'];
    $password1 = md5($_POST['password1']);
    $password2 = md5($_POST['password2']);
    if($password1==$password2)
    {
      $password=$password1;
    }
    else
    {
      echo '<script>alert("New Password & Confirm Password does not match!!!")</script>'; 
    }
    $token1 = openssl_random_pseudo_bytes(16);
 
    $token = bin2hex($token1);
    $status="Inactive";

    $res= mysqli_query($conn,"SELECT * FROM supplier where email='" . $_POST['email'] . "'");
    $row = mysqli_fetch_assoc($res);
    $user_email=$row['email'];
    $res= mysqli_query($conn,"SELECT * FROM supplier where phone='" . $_POST['phone'] . "'");
    $row = mysqli_fetch_assoc($res);
    $user_phone=$row['phone'];
    if($user_email==$email)
    {
      echo '<script>alert("$email already Exists!!!")</script>'; 
    }
    elseif($user_phone==$phone)
    {
      echo '<script>alert("$phone already Exists!!!")</script>'; 
    }
      else
      {
        $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = 'uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx' ,'pptx','png','jpg','jpeg','bmp'])) {
        echo "You file extension must be .zip, .pdf, .png, .jpg, .jpeg, ,bmp or .docx";
    } elseif ($_FILES['myfile']['size'] > 40000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
      $result = "INSERT INTO supplier (org, type, address, email, fax, license, aadhaar, phone, contactp, password, file, token, status, created, updated) VALUES ('$org', '$type', '$address', '$email', '$fax', '$license', '$aadhaar', '$phone', '$contactp', '$password','$filename','$token','$status',now(),now())";
    }else
    {
      echo '<script>alert("Something went wrong in file upload")</script>'; 
    }
   

    if ($conn->query($result) === TRUE) 
      {
          header("Location: login.php");
        }
     else 
      {
         echo "Error: " . $result . "<br>" . $conn->error;
      }
}
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Supplier Registration </title>
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
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
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
						Supplier Registration
					</span>
					<span class="txt1 p-b-11">
						Organization Name
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Organization Name is required">
						<input class="input100" type="text" name="org" id="org" placeholder="Eg NSC,SSCI etc.." required>
						<span class="focus-input100"></span>
					</div>
					<span class="txt1 p-b-11">
						Type
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Type is required">
						
                <select class="input100" name="type" id="type">
                  <option selected>Select Type</option>
                  <option value="Seed Producing">Seed Producing</option>
                  <option value="Retailer">Retailer</option>
                  <option value="Distributor">Distributor</option>
                  <option value="Wholesaler">Wholesaler</option>
                </select>
						<span class="focus-input100"></span>
					</div>
					<span class="txt1 p-b-11">
						Address
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Address is required">
						<textarea class="input100" name="address"  placeholder="Gandhi Marg-301" required></textarea>    
						<span class="focus-input100"></span>
					</div>

					<span class="txt1 p-b-11">
						Email Id
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Email Id is required">
						<input class="input100" type="email" name="email" id="email" placeholder="joe@exmple.com" required>
						<span class="focus-input100"></span>
					</div>
					<span class="txt1 p-b-11">
						FAX
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "FAX is required">
						<input class="input100" type="number" id="fax" name="fax" placeholder="022-776543" required>
						<span class="focus-input100"></span>
					</div>
					<span class="txt1 p-b-11">
						License No
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "License No is required">
						<input class="input100" type="text" name="license" id="license" placeholder="LICENSE NUMBER" required>
						<span class="focus-input100"></span>
					</div>
					<span class="txt1 p-b-11">
						Udyog Aadhaar No.
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Aadhaar No is required">
						<input class="input100" type="text" name="aadhaar" id="aadhaar" placeholder="0000 1111 2222" required>
						<span class="focus-input100"></span>
					</div>
					<span class="txt1 p-b-11">
						Mobile No.
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Mobile No is required">
						<input class="input100" type="text" name="phone" id="phone" pattern="[789][0-9]{9}" placeholder="9988776655" required>
						<span class="focus-input100"></span>
					</div>
					<span class="txt1 p-b-11">
						Contact Person
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Contact Person name is required">
						<input class="input100" type="text" name="contactp" id="contactp" required>
						<span class="focus-input100"></span>
					</div>
					<span class="txt1 p-b-11">
						Password
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
						<!--<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>-->
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
					<span class="txt1 p-b-11">
						License Copy
					</span>
				<div class="wrap-input100 validate-input m-b-12" data-validate = "License Copy is required">
					<label for="upload-photo"> </label>
					<input type="file" class="input100" name="myfile" id="myfile"/>
					<span class="focus-input100"></span>
					</div>
					<div>
					<p style="font-style:italic;">Note:Please Upload relevant business document or company profile for authentication.</p>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="submit" id="submit">
							Register
							
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
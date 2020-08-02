<?php
session_start();
include_once 'config/database.php';
if(isset($_POST['submit']))
{
    $fname = $_POST['fname'];
    $contactno = $_POST['contactno'];
    $bagno = $_POST['bagno'];
    $lotno = $_POST['lotno'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $address = $_POST['address'];
    $pincode = $_POST['pincode'];
    $aadhaar = $_POST['aadhaar'];

	$filename1 = $_FILES['file1']['name'];
    
    // destination of the file on the server
    $destination1 = 'uploads/' . $filename1;
    
    // get the file extension
    $extension1 = pathinfo($filename1, PATHINFO_EXTENSION);
    
    // the physical file on a temporary uploads directory on the server
    $file1 = $_FILES['file1']['tmp_name'];
    $size1 = $_FILES['file1']['size'];

    if (!in_array($extension1, ['zip', 'pdf', 'docx' ,'pptx','png','jpg','jpeg','bmp'])) {
        echo "You file extension must be .zip, .pdf, .png, .jpg, .jpeg, ,bmp or .docx";
    } elseif ($_FILES['file1']['size'] > 40000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file1, $destination1)) {
      $result = "INSERT INTO yield (fname, contactno, bagno, lotno, city, state, address, pincode, aadhaar, file1, created) VALUES ('$fname', '$contactno', '$bagno', '$lotno', '$city', '$state', '$address', '$pincode', '$aadhaar', '$filename1', now())";
    }else
    {
      echo '<script>alert("Something went wrong in file upload")</script>'; 
    }
   

    if ($conn->query($result) === TRUE) 
      {
        //header("Location: http://www.google.com/");
        echo "<script>alert('Yield Report Submitted to official');</script>";
      }
     else 
      {
        echo "Error: " . $result . "<br>" . $conn->error;
      }
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Farmer Details</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="f_vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="f_fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="f_fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="f_vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="f_vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="f_vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="f_vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="f_vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="f_css/util.css">
	<link rel="stylesheet" type="text/css" href="f_css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				<form class="login100-form validate-form flex-sb flex-w" method="post" action="" enctype="multipart/form-data">
					<span class="login100-form-title p-b-32">
						Farmer Details
					</span>
					<span class="txt1 p-b-11">
						Farmer Name
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Farmer Name is required">
						<input class="input100" type="text" id="fname" name="fname"  placeholder="Ravi Kumar" required>
						<span class="focus-input100"></span>
					</div>
					<span class="txt1 p-b-11">
						Contact Number
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Contact Number is required">
						<input class="input100" type="text" id="contactno" name="contactno"  placeholder="9988776655" required>
						<span class="focus-input100"></span>
					</div>
					<span class="txt1 p-b-11">
						Seed Bag Number
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Bag Number is required">
						<input class="input100" type="text" id="bagno" name="bagno"  placeholder="12345" required>
						<span class="focus-input100"></span>
					</div>
					<span class="txt1 p-b-11">
						Seed Lot Number
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Lot Number is required">
						<input class="input100" type="text" id="lotno" name="lotno"  placeholder="4445" required>
						<span class="focus-input100"></span>
					</div>
					<span class="txt1 p-b-11">
						City
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "City is required">
						<input class="input100" type="text" id="city" name="city"  placeholder="Mumbai" required>
						<span class="focus-input100"></span>
					</div>
					<span class="txt1 p-b-11">
						State
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "State is required">
						
                <select class="input100" id="state" name="state">
                  <option selected>Select State</option>
                  <option value="Maharashtra">Maharashtra</option>
                  <option value="West Bengal">West Bengal</option>
                  <option value="Uttar Pradesh">Uttar Pradesh</option>
                  <option value="Madhya Pradesh">Madhya Pradesh</option>
				  <option value="Tamil Nadu">Tamil Nadu</option>
				  <option value="Rajasthan">Rajasthan</option>
				  <option value="Gujarat">Gujarat</option>
				  <option value="Andhra Pradesh">Andhra Pradesh</option>
                </select>
						<span class="focus-input100"></span>
					</div>
					<span class="txt1 p-b-11">
						Address
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Address is required">
						<input class="input100" type="textarea" id="address" name="address"  placeholder="Gandhi Marg-301" required>
						<span class="focus-input100"></span>
					</div>

					
					<span class="txt1 p-b-11">
						Pincode
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Pincode is required">
						<input class="input100" type="text" id="pincode" name="pincode"  placeholder="400 809" required>
						<span class="focus-input100"></span>
					</div>
					
					<span class="txt1 p-b-11">
						 Aadhaar Number
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Aadhaar Number is required">
						<input class="input100" type="text" id="aadhaar" name="aadhaar"  placeholder="0000 1111 2222" required>
						<span class="focus-input100"></span>
					</div>
					
					<span class="txt1 p-b-11">
						File #1
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate = "License Copy is required">
						<label for="upload-photo"> </label>
						<input type="file" class="input100" name="file1" id="file1"/>
						<span class="focus-input100"></span>
					</div>

					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="submit" id="submit">
							Submit
							
						</button>
					
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<script src="f_vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="f_vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="f_vendor/bootstrap/js/popper.js"></script>
	<script src="f_vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="f_vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="f_vendor/daterangepicker/moment.min.js"></script>
	<script src="f_vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="f_vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="f_js/main.js"></script>
	
</body>
</html>
<?php
session_start();
include_once 'config/database.php';
if (isset($_SESSION['user'])) {
$user=$_SESSION['user'];
$result = mysqli_query($conn,"SELECT * FROM supplier where email='$user'");
 $row = mysqli_fetch_assoc($result);
 $user_status=$row['status'];
 $user_type=$row['type'];
 if($user_status=='Active')
 {
 $org=$row['org'];
 $email=$row['email'];
 $type=$row['type'];
 $contactp=$row['contactp'];
 $address=$row['address'];
 $fax=$row['fax'];
 $pass=$row['password'];
 $phone=$row['phone'];
 if(isset($_POST['submit']))
{
    $password1 = md5($_POST['password1']);
    $password2 = md5($_POST['password2']);
    $password3 = md5($_POST['password3']);
    if($password1==$pass)
    {
      if($password2==$password3)
      {

      $update="UPDATE supplier SET password='$password2',updated=now() where email='$email'";
    if ($conn->query($update) === TRUE) 
    {
        echo '<script>alert("Password updated successfully")</script>';
    }
    else 
    {
        echo "Error: " . $update . "<br>" . $conn->error;
    }
  }
  else
  {
    echo '<script>alert("New Password and Confirm Password does not mactched")</script>';
  }
    }
    else
    {
      echo '<script>alert("Wrong Old Password")</script>';
    }
   
  }
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Now UI Dashboard by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
  <style>
  .button1 {
  background-color: orange;
  color: black;
  border: 2px solid #4CAF50;
  border-radius: 50px;
  padding: 10px 20px;
}
 button1:hover {
  background-color: #4CAF50;
  color: white;
}



</style>
</head>

<body class="user-profile">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      
      <?php 
      if($user_type=='Official')
      {
     include('offsidebar.php');
   }else
   {
    include('supsidebar.php');
   }

      ?>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">Change Supplier Password</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <?php include('action.php');?>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Change Password</h5>
				&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
              </div>
              <div class="card-body">
                <form method="post" action="" enctype="multipart/form-data">
                  <div class="col-md-4 px-1">
                      <div class="form-group">
                      <b>  <h6> &nbsp; &nbsp; Old Password</h6></b>
						
					 <input type="password" class="form-control" name="password1" id="password1" placeholder="Old Password">
						<br></br>
					  
					  </div>
                    </div>
					<div class="col-md-4 px-1">
					 <div class="form-group">
                      <b>  <h6>&nbsp; &nbsp; New Password</h6></b>
						
                      
                        <input type="password" class="form-control" name="password2" id="password2" placeholder="New Password">
						
					  <br></br>
					  </div>
					  </div>
					  <div class="col-md-4 px-1">
					   <div class="form-group">
                      <b>  <h6> &nbsp; &nbsp; Confirm Password</h6></b>
						
							
                      
                        <input type="password" class="form-control" name="password3" id="password3" placeholder="Confirm Password">
						
					  
					  </div>
					  </div>
					 &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
					 <div>
                      &nbsp; &nbsp; <input type="submit" id="submit" name="submit" class="btn btn-primary" value="Submit">
	 
    </div> 
					  
                </form>
              </div>
            </div>
          </div>
            </ul>
          </nav>
          
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/demo/demo.js"></script>
</body>

</html>
<?php
}
}else
{
header("location: ./login.php");
}?>
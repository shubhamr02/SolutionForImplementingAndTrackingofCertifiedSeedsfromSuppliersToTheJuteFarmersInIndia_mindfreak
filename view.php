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
 $phone=$row['phone'];
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
  border-radius: 12px;
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
            <a class="navbar-brand" href="#pablo">View Supplier Profile</a>
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
                <h5 class="title">View Profile</h5>
              </div>
              <div class="card-body">
                <form>
                  <div class="row">
				  <div class="col-md-5 pr-1">
                      <div class="form-group">
                    <span class="txt1 p-b-11">
						<b>Organization Name :</b> &nbsp; &nbsp; <?php echo "$org"; ?>
					</span>
                    </div>
					
                    
                      <div class="form-group">
                      <span class="txt1 p-b-11">
						<b>Email :</b> &nbsp; &nbsp; <?php echo "$email"; ?>

					</span>
              </div>
                    
                    <div class="form-group">
                      <span class="txt1 p-b-11">
						<b>Type :</b> &nbsp; &nbsp;<?php echo "$type"; ?>
						
						
						

					</span>
              </div>
			  
                    <div class="form-group">
                      <span class="txt1 p-b-11">
						<b>Contact Person :</b>  &nbsp; &nbsp; <?php echo "$contactp"; ?>

					</span>
              </div>
			  <div class="form-group">
                      <span class="txt1 p-b-11">
						<b>Address :</b> &nbsp; &nbsp; <?php echo "$address"; ?></br>
							
					</span>
              </div>
			  <div class="form-group">
                      <span class="txt1 p-b-11">
						<b>FAX :</b>  &nbsp; &nbsp; <?php echo "$fax"; ?>
							 
					</span>
              </div>
			  <div class="form-group">
                      <span class="txt1 p-b-11">
						<b>Mobile No. :</b>  &nbsp; &nbsp; <?php echo "$phone"; ?>
						
					</span>
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
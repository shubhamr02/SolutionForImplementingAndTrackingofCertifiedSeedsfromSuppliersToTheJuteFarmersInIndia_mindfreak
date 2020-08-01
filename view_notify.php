<?php
session_start();
include_once 'database.php';
if (isset($_SESSION['user'])) {
$user=$_SESSION['user'];
$result = mysqli_query($conn,"SELECT * FROM supplier where email='$user'");
 $row = mysqli_fetch_assoc($result);
 $user_status=$row['status'];
 $token=$row['token'];
  $user_type=$row['type'];
$result12 = mysqli_query($conn,"SELECT * FROM notifications");
if($user_type=='Official')
 {

if (isset($_GET['visible'])){
  $vid= $_GET['id'];
 
  $sql14="UPDATE notifications SET nstatus='Visible' where nid=$vid";
   if ($conn->query($sql14) === TRUE) 
      {
        echo "<script>alert('Visiblity Status Changed')</script>";
          header("Location: view_notify.php");
        }
     else 
      {
         echo "Error: " . $sql14 . "<br>" . $conn->error;
      }
}

if (isset($_GET['invisible'])){
  $iid= $_GET['id'];

  $sql15="UPDATE notifications SET nstatus='Invisible' where nid=$iid";
   if ($conn->query($sql15) === TRUE) 
      {
        echo "<script>alert('Visiblity Status Changed')</script>";
          header("Location: view_notify.php");
        }
     else 
      {
         echo "Error: " . $sql15 . "<br>" . $conn->error;
      }
}

if (isset($_GET['delete'])){
  $did= $_GET['id'];
  $sql16="DELETE from notifications where nid=$did";
   if ($conn->query($sql16) === TRUE) 
      {
        echo "<script>alert('Notification Deleted')</script>";
          header("Location: view_notify.php");
        }
     else 
      {
         echo "Error: " . $sql16 . "<br>" . $conn->error;
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
   National Jute Board
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
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
</head>

<body class="">
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
            <a class="navbar-brand" href="#pablo"></a>
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
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Notifications</h4>
                 <p class="card-category">24 Hours Record</p>
              </div>
              <div class="card-body " style="overflow: scroll;">
                <div class="table-responsive">
                  <table class="table" id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead class=" text-primary">
                     <tr> 
                      <th>ORG</th>
                       <th>User Type</th> 
                      <th>Message Type</th> 
                      <th>Message</th> 
                      <th>Status</th> 
                      <th>Created</th> 
                      <th>Action</th> 
                     
                    </tr> 
                  </thead> 
                  <tbody> 
                    <?php 

                   
                    if ($result12->num_rows > 0) {
                    // output data of each row
                    while($row12 = $result12->fetch_assoc()) {

                    

                      echo" <tr>"; 
                      echo"<td>".$row12['org']."</td>";
                       echo"<td>".$row12['usertype']."</td>"; 
                       echo"<td>".$row12['msgtype']."</td>"; 
                       echo"<td>".$row12['message']."</td>"; 
                       echo"<td>".$row12['nstatus']."</td>"; 
                       echo"<td>".$row12['created']."</td>"; 
                       
                      
                        echo"<td>"?>
                          <a href="view_notify.php?visible=true&id=<?php echo($row12['nid']);?>"> <i class="fa fa-check" style="color: green"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          <a href="view_notify.php?invisible=true&id=<?php echo($row12['nid']);?>"> <i class="fa fa-ban" style="color: grey"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                         <a href="view_notify.php?delete=true&id=<?php echo($row12['nid']);?>"> <i class="fa fa-times" style="color: red"></i></a>
                       <?php echo"</td>";
                       
                         echo" </tr>"; }
                        }
                        ?>
                  </tbody> 
                  <tfoot> 
                    <tr>
                   <tr> 
                      <th>ORG</th>
                       <th>User Type</th> 
                      <th>Message Type</th> 
                      <th>Message</th> 
                      <th>Status</th> 
                      <th>Created</th> 
                      <th>Action</th> 
                     
                    </tr> 
                    </tr> 
                  </tfoot> 
                  </table>
                </div>
              </div>
            </div>
          </div>
          
     <?php include('footer.php'); ?>
    </div>
  </div>
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
   <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      $('#example').DataTable();
    });
  </script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/demo/demo.js"></script>
</body>

</html>
<?php 
}
}
else{
  header("location: ./login.php");
}?>
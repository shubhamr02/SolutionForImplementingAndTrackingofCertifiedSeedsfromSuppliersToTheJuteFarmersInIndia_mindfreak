<?php
session_start();
include_once 'config/database.php';
if (isset($_SESSION['user'])) {
$user=$_SESSION['user'];
$result = mysqli_query($conn,"SELECT * FROM supplier where email='$user'");
 $row = mysqli_fetch_assoc($result);
 $user_status=$row['status'];
 $user_type=$row['type'];
 if($user_type!='Official' && $user_status=='Active')
 {


  $result31 = mysqli_query($conn,"SELECT * FROM sale where email='$user' order by fsid DESC limit 5");

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
   <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <!-- CSS Files -->
  <link href="sassets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="sassets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="sassets/demo/demo.css" rel="stylesheet" />
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
            <a class="navbar-brand" href="#pablo">Dashboard</a>
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
      <div class="panel-header panel-header-lg">

        <canvas id="bigDashboardChart"></canvas>

      </div>
     <div class="content">
      <div class="alert alert-info alert-dismissible fade show" role="alert">
        <h5 class="alert-heading">Instructions</h5>
          1. Start with adding your inventory using<strong> Add Inventory</strong>.<br>
          2. Now start adding yourseed detail using<strong> Add Seed Details</strong>.<br>
          3. To procure new seeds use<strong> Add Procurement</strong>.<br>
          4. To log new sales details use<strong> Add Sale</strong>.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div >
      <i class="fa fa-users fa-4x" style="color:orangered;" aria-hidden="true"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <h5 class="card-title">Total Jute Farmers</h5><br/>
                      <?php $result2 = mysqli_query($conn,"SELECT fname,email FROM sale group by fname having email='$user'");
                        $row2 = mysqli_num_rows($result2);
 
 ?>
                      <h2 class="card-title"  style="color:#185cf5;"><?php echo "$row2"; ?></h2>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-refresh" ></i>
                  Update Now
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div >
      <i class="fa fa-seedling fa-4x" style="color:green;" aria-hidden="true"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <h5 class="card-title">Total Seeds Sold</h5><br/><br/>
                      <?php $result7 = mysqli_query($conn,"SELECT sum(qty) as qty,email FROM sale where email='$user'");
                        $row7 = mysqli_fetch_assoc($result7);
                         $s_qty=$row7['qty'];
 ?>
                      
                      <h2 class="card-title"  style="color:#185cf5;"><?php echo "$s_qty"; ?></h2>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-refresh"></i>
                  Update Now
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div >
      <i class="fa fa-database fa-4x" style="color:#585353;" aria-hidden="true"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <h5 class="card-title">Total Seeds in Inventory</h5><br/>
                      <?php
                      $result3 = mysqli_query($conn,"SELECT sum(qty) as qty,email FROM inventory where email='$user'");
                      $row3 = mysqli_fetch_assoc($result3);

                      $i_qty=$row3['qty'];
                      $result8 = mysqli_query($conn,"SELECT sum(qty) as qty,email FROM off_inventory where email='$user' and status='Sent' Or status='Received' or status='Done'");
                      $row8 = mysqli_fetch_assoc($result8);
                      $ofi_qty=$row8['qty'];
                      $tqty=$i_qty+$ofi_qty;
                      ?>
                      <h2 class="card-title"  style="color:#185cf5;"><?php echo "$tqty"; ?></h2>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-refresh"></i>
                  Update Now
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Total Sales</h4>
                 <p class="card-category">24 Hours Record</p>
              </div>
              <div class="card-body " style="overflow: scroll;">
                <div class="table-responsive">
                  <table class="table" id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead class=" text-primary">
                     <tr> 
                      <th>Farmer Name</th>
                      <th>Seed Type</th> 
                      <th>Seed</th> 
                      <th>Qty</th> 
                      <th>Farmer's Contact</th> 
                      <th>Supplier</th> 
                      <th>Farmer's Aadhar no</th> 
                      <th>LOT No.</th>
                     <th>Bag No.</th>
                      <th>Farmer's Address</th>
                       <th>Pincode</th>

                    </tr> 
                  </thead> 
                  <tbody> 
                   <?php 

                   
                    if ($result31->num_rows > 0) {
                    // output data of each row
                    while($row17 = $result31->fetch_assoc()) {

                    

                      echo" <tr>"; 
                      echo"<td>".$row17['fname']."</td>";
                       echo"<td>".$row17['seedtype']."</td>"; 
                       echo"<td>".$row17['seed']."</td>"; 
                       echo"<td>".$row17['qty']."</td>"; 
                       echo"<td>".$row17['fphone']."</td>"; 
                       echo"<td>".$row17['supplier']."</td>"; 
                      echo"<td>".$row17['faadhaar']."</td>";
                       echo"<td>".$row17['lot']."</td>"; 
                       echo"<td>".$row17['bag']."</td>";
                         echo"<td>".$row17['faddress']."</td>";
                           echo"<td>".$row17['pincode']."</td>";
                       }
                        }
                        ?>
                     </tbody> 
                  <tfoot> 
                    <tr>
                  <th>Farmer Name</th>
                   <th>Seed Type</th>
                      <th>Seed</th> 
                      <th>Qty</th> 
                      <th>Farmer's Contact</th> 
                      <th>Supplier</th> 
                      <th>Farmer's Aadhar no</th> 
                      <th>LOT No.</th>
                     <th>Bag No.</th>
                      <th>Farmer's Address</th>
                       <th>Pincode</th>
                      
                    </tr> 
                  </tfoot> 
                  </table>
                </div>
              </div>
            </div>
          </div>





      </div>         
      <?php include('footer.php'); ?>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="sassets/js/core/jquery.min.js"></script>
  <script src="sassets/js/core/popper.min.js"></script>
  <script src="sassets/js/core/bootstrap.min.js"></script>
  <script src="sassets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="sassets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="sassets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="sassets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="sassets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      $('#example').DataTable();
    });
  </script>
</body>

</html><?php
}
}else
{
header("location: ./login.php");
}?>
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
if($user_type=='Official')
 {
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
                <h4 class="card-title">Track Seed Package</h4>
                
              </div>
              <div class="card-body " >
               <form action="" method="post" enctype="multipart/form-data">
                        
                            <div class="form-group col-sm-4" style="font-size: large;">
                                    <label for="track">
                                    &nbsp;&nbsp;Enter Lot No </label><br><br>
                                    <input type="text" class="form-control form-control-sm mr-1" id="test" name="test" required><br>
                                     <button type="submit" name="submit" id="submit" class="btn btn-primary" >Track</button>
                            </div>
                </form> 
             
           <?php 
                    if(isset($_POST['submit']))
                    {
                    $test = $_POST['test'];
                    $result1 = mysqli_query($conn,"SELECT * FROM inventory where lot=$test OR bag=$test");
                    $row1 = mysqli_fetch_assoc($result1);
                    $result3 = mysqli_query($conn,"SELECT * FROM sale where lot=$test OR bag=$test");
                    $row3 = mysqli_fetch_assoc($result3);?>
                    
                    <?php
                    if($row1!=0)
                    {
                       $org=$row1['org'];
                    $email=$row1['email'];
                    $supplier=$row1['supplier'];
                     $seedtype=$row1['seedtype'];
                    $seed=$row1['seed'];
                    $qty=$row1['qty'];
                    $germination=$row1['germination'];
                    $purity=$row1['purity'];
                    $lot=$row1['lot'];
                    $insofficer=$row1['insofficer'];
                    $bag=$row1['bag'];
                    $certificate=$row1['certificate'];
                    $analysis=$row1['analysis'];
                    ?>


   <div class="content">
        <div class="row">
          <div class="col-md-12">      
 <div class="card">
              <div class="card-header">
                <h4 class="card-title">Supplier Details</h4>
                
              </div>
              <div class="card-body " >
                  
                    <div class="table-responsive">
                     <table class="table" id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead class=" text-primary">
                     <tr>
                     <th>Organization</th>  
                      <th>Email</th> 
                      <th>Supplier</th> 
                       <th>Seed Type</th> 
                      <th>Seed Name</th> 
                      <th>QTY</th>
                      <th>Germination</th> 
                      <th>Purity</th> 
                      <th>LOT No.</th> 
                      <th>Inspection Officer</th> 
                      <th>Bag</th> 
                      <th>Certificate</th> 
                      <th>Analysis Report</th>  
                    </tr> 
                  </thead> 
                  <tbody> <?php

                     echo" <tr>";
                      echo"<td>".$row1['org']."</td>"; 
                      echo"<td>".$row1['email']."</td>";
                       echo"<td>".$row1['supplier']."</td>"; 
                        echo"<td>".$row1['seedtype']."</td>"; 
                       echo"<td>".$row1['seed']."</td>"; 
                     echo"<td>".$row1['qty']."</td>"; 
                      echo"<td>".$row1['germination']."</td>";
                       echo"<td>".$row1['purity']."</td>"; 
                         echo"<td>".$row1['lot']."</td>"; 
                       echo"<td>".$row1['insofficer']."</td>";
                         echo"<td>".$row1['bag']."</td>";
                         ?>
                         <td>
                          <a href="upload/<?php echo "$certificate";?>" target="_blank">View Certificate</a>
                         </td>
                         <td>
                          <a href="upload/<?php echo "$analysis";?>" target="_blank">View Analysis Report</a>
                         </td>
                        <?php
                       echo"</td>"; 
                        
                        ?>
                     </tbody> 
                  <tfoot> 
                    <tr>
                      <th>Organization</th>
                     <th>Email</th> 
                      <th>Supplier</th> 
                       <th>Seed Type</th> 
                      <th>Seed Name</th> 
                      <th>QTY</th>
                      <th>Germination</th> 
                      <th>Purity</th> 
                      <th>LOT No.</th> 
                      <th>Inspection Officer</th> 
                      <th>Bag</th> 
                      <th>Certificate</th> 
                      <th>Analysis Report</th> 
                    </tr> 
                  </tfoot> 
                  </table>
                    </div>
                  <?php  }else{
                  echo "No record found!";
                }?>
              </div>
            </div>
          </div>
        </div>
  


        
                    <div class="content">
        <div class="row">
          <div class="col-md-12">      
 <div class="card">
              <div class="card-header">
                <h4 class="card-title">Sold to Farmer</h4>
                
              </div>
              <div class="card-body " >
                  <?php
                    if($row3!=0)
                    {
                     
                    $fname=$row3['fname'];
                    $seedtype1=$row3['seedtype'];
                    $seed1=$row3['seed'];
                    $qty1=$row3['qty'];
                    $fphone=$row3['fphone'];
                    $supplier1=$row3['supplier'];
                    $faadhaar=$row3['faadhaar'];
                    $faddress=$row3['faddress'];
                    $lot1=$row3['lot'];
                    $pincode=$row3['pincode'];
                    $bag1=$row3['bag'];
                    $created=$row3['created'];
                    $org1=$row3['org'];
                    $email1=$row3['email'];
                    ?>
                    <div class="table-responsive">
                     <table class="table" id="ex" class="table table-striped table-bordered" style="width:100%">
                    <thead class=" text-primary">
                     <tr>
                     <th>Organization</th>  
                      <th>Email</th> 
                      <th>Supplier</th> 
                      <th>Farmer Name</th> 
                       <th>Seed Type</th> 
                      <th>Seed Name</th> 
                      <th>QTY</th>
                      <th>Farmer's Contact</th> 
                       <th>Farmer's Aadhaar</th> 
                      <th>LOT No.</th> 
                       <th>Bag No.</th> 
                      <th>Farmer's Address</th> 
                      <th>Pincode</th> 
                      <th>Created</th>  
                    </tr> 
                  </thead> 
                  <tbody> <?php

                     echo" <tr>"; 
                      echo"<td>".$row3['org']."</td>";
                      echo"<td>".$row3['email']."</td>";
                      echo"<td>".$row3['supplier']."</td>";
                      echo"<td>".$row3['fname']."</td>";
                      echo"<td>".$row3['seedtype']."</td>";
                       echo"<td>".$row3['seed']."</td>";
                        echo"<td>".$row3['qty']."</td>";
                        echo"<td>".$row3['fphone']."</td>";
                        echo"<td>".$row3['faadhaar']."</td>";
                        echo"<td>".$row3['lot']."</td>";
                        echo"<td>".$row3['bag']."</td>";
                        echo"<td>".$row3['faddress']."</td>";
                        echo"<td>".$row3['pincode']."</td>";
                        echo"<td>".$row3['created']."</td>";
                       echo"</td>"; 
                        
                        ?>
                     </tbody> 
                  <tfoot> 
                    <tr>
                      <th>Organization</th>  
                      <th>Email</th> 
                      <th>Supplier</th> 
                      <th>Farmer Name</th> 
                       <th>Seed Type</th> 
                      <th>Seed Name</th> 
                      <th>QTY</th>
                      <th>Farmer's Contact</th> 
                       <th>Farmer's Aadhaar</th> 
                      <th>LOT No.</th> 
                       <th>Bag No.</th> 
                      <th>Farmer's Address</th> 
                      <th>Pincode</th> 
                      <th>Created</th> 
                    </tr> 
                  </tfoot> 
                  </table>
                    </div>
                  
                 <?php  }else{
                  echo "No selling record found!";
                }
              }
                  ?> 

                </div>
            </div>
          </div>
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
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      $('#ex').DataTable();
    });
  </script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
</body>

</html><?php 
}
}
else
{
  header("location: ./login.php");
}?>
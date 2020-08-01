<?php
session_start();
include_once 'config/database.php';
if (isset($_SESSION['user'])) {
$user=$_SESSION['user'];
$result = mysqli_query($conn,"SELECT * FROM supplier where email='$user'");
 $row = mysqli_fetch_assoc($result);
 $user_status=$row['status'];
 $user_type=$row['type'];
 if($user_status==='Active')
 {

  if (isset($_GET['send'])){
  $id= $_GET['id'];
  $token=$_GET['offtoken'];
  
$sql3="UPDATE orderfs SET ostatus='Received' where otoken='$token'";
   if ($conn->query($sql3) === TRUE) 
      {
        
}else{
  echo "Error: " . $sql3 . "<br>" . $conn->error;
}
 
  $sql="UPDATE off_inventory SET status='Received',updated=now() where offid=$id";
   if ($conn->query($sql) === TRUE) 
      {
        echo "<script>alert('Procurement Received Successfully')</script>";
}else{
  echo "Error: " . $sql . "<br>" . $conn->error;
}

}

if (isset($_GET['done'])){
  $sid= $_GET['id'];
   $abtoken= $_GET['abtoken'];
   $sql4="UPDATE orderfs SET ostatus='Done' where otoken='$abtoken'";
   if ($conn->query($sql4) === TRUE) 
      {
       
}else{
  echo "Error: " . $sql4 . "<br>" . $conn->error;
}

 
  $sql1="UPDATE off_inventory SET status='Done',updated=now() where offid=$sid";
   if ($conn->query($sql1) === TRUE) 
      {
        echo "<script>alert('Procurement Successfully Completed')</script>";
}else{
  echo "Error: " . $sql1 . "<br>" . $conn->error;
}

}
if(isset($_POST['submit2']))
{
  date_default_timezone_set('Asia/Kolkata');
    $org2 =$_POST['org2'];
    $usertype2=$_POST['usertype2'];
    $msgtype2=$_POST['msgtype2'];
    $msg2=$_POST['msg2'];
    $nstatus='Visible';
    $result15 = "INSERT INTO notifications (org, usertype, msgtype, message, nstatus, created) VALUES ('$org2', '$usertype2','$msgtype2', '$msg2', '$nstatus', now())";
    

    if ($conn->query($result15) === TRUE) 
      {
          header("Location: view_notify.php");
        }
     else 
      {
         echo "Error: " . $result15 . "<br>" . $conn->error;
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
   Notifications
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
   <style >
       body{margin-top:20px;}

.steps .step {
    display: block;
    width: 100%;
    margin-bottom: 35px;
    text-align: center
}

.steps .step .step-icon-wrap {
    display: block;
    position: relative;
    width: 100%;
    height: 80px;
    text-align: center
}

.steps .step .step-icon-wrap::before,
.steps .step .step-icon-wrap::after {
    display: block;
    position: absolute;
    top: 50%;
    width: 50%;
    height: 3px;
    margin-top: -1px;
    background-color: #e1e7ec;
    content: '';
    z-index: 1
}

.steps .step .step-icon-wrap::before {
    left: 0
}

.steps .step .step-icon-wrap::after {
    right: 0
}

.steps .step .step-icon {
    display: inline-block;
    position: relative;
    width: 65px;
    height: 65px;
    border: 1px solid #e1e7ec;
    border-radius: 50%;
    background-color: #f5f5f5;
    color: #374250;
    font-size: 38px;
    line-height: 66px;
    z-index: 5
}

.steps .step .step-title {
    margin-top: 16px;
    margin-bottom: 0;
    color: #606975;
    font-size: 14px;
    font-weight: 500
}

.steps .step:first-child .step-icon-wrap::before {
    display: none
}

.steps .step:last-child .step-icon-wrap::after {
    display: none
}

.steps .step.completed .step-icon-wrap::before,
.steps .step.completed .step-icon-wrap::after {
    background-color: #0da9ef
}

.steps .step.completed .step-icon {
    border-color: #0da9ef;
    background-color: #0da9ef;
    color: #fff
}

@media (max-width: 576px) {
    .flex-sm-nowrap .step .step-icon-wrap::before,
    .flex-sm-nowrap .step .step-icon-wrap::after {
        display: none
    }
}

@media (max-width: 768px) {
    .flex-md-nowrap .step .step-icon-wrap::before,
    .flex-md-nowrap .step .step-icon-wrap::after {
        display: none
    }
}

@media (max-width: 991px) {
    .flex-lg-nowrap .step .step-icon-wrap::before,
    .flex-lg-nowrap .step .step-icon-wrap::after {
        display: none
    }
}

@media (max-width: 1200px) {
    .flex-xl-nowrap .step .step-icon-wrap::before,
    .flex-xl-nowrap .step .step-icon-wrap::after {
        display: none
    }
}

.bg-faded, .bg-secondary {
    background-color: #f5f5f5 !important;
}
    </style>

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
      <div class="panel-header">
        <div class="header text-center">
          <h2 class="title">Notifications</h2>
          </div>
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Procurement Notifications</h4>
              </div>
              <!-- Official Notification open-->
                      <?php

                  $result40 = mysqli_query($conn,"SELECT * FROM notifications where usertype='$user_type' or usertype='All' and nstatus='Visible' ");
                  
                   if ($result40->num_rows > 0) 
                   {
                    
                    while($row40= $result40->fetch_assoc()) {
                      ?>

              <div class="card-body">
                
               <div class="alert alert-<?php echo($row40['msgtype']); ?>">
                  
                  <span><b><?php echo($row40['usertype']); ?> Suppliers -</b><?php echo($row40['message']); ?> </span>
                </div>
              </div>
              <?php }   
                }
                  ?>
              <!-- Official Notification Close-->
              <!-- Procurement Notification-->
                 <?php

                  $result4 = mysqli_query($conn,"SELECT * FROM off_inventory where email='$user' and status='Sent'");
                  
                   if ($result4->num_rows > 0) 
                   {
                    
                    while($row4 = $result4->fetch_assoc()) {
                      ?>

              <div class="card-body">
                
                <div class="alert alert-info alert-with-icon" data-notify="container">
                  
                  <span data-notify="icon" class="now-ui-icons ui-1_bell-53"></span>
                  <span data-notify="message">Your Procurement of seeds <?php echo($row4['qty']); ?> Kgs has been dispatched, if you have received then, <a href="notifications.php?send=true&id=<?php echo($row4['offid']);?>&offtoken=<?php echo($row4['offtoken']);?>" style="color:black;"><b>click here</b></a></span>

                </div>
              </div>
              <?php }   
                }
                  ?>


<?php

                  $result5 = mysqli_query($conn,"SELECT * FROM off_inventory where official='$user' and status='Received'");
                  
                   if ($result5->num_rows > 0) 
                   {
                    
                    while($row5 = $result5->fetch_assoc()) {
                      ?>

              <div class="card-body" >
                
                <div class="alert alert-info alert-with-icon" data-notify="container">
                  <a href="notifications.php?done=true&id=<?php echo($row5['offid']);?>&abtoken=<?php echo($row5['offtoken']);?>"><button aria-hidden="true" class="close">
                    <i class="now-ui-icons ui-1_simple-remove"></i>
                  </button></a>
                  <span data-notify="icon" class="now-ui-icons ui-1_bell-53"></span>
                  <span data-notify="message">Your Procurement of seeds <?php echo($row5['qty']); ?> Kgs has been by Supplier <?php echo($row5['supplier']); ?></span>
            
                </div>
              </div>
              <?php }   
                }
                  ?>





            </div>
          </div>
          <div class="col-md-6">
          
               
                <div class="row">

                 <?php if($user_type=='Official')
                 {?>
                  <div class="card">
              <div class="card-header">
                <h4 class="card-title">Message For Suppliers</h4></div>
                 <div class="card-body" >
                   <form action="" method="post" enctype="multipart/form-data">
                       <div class="row">
                            <div class="form-group col-sm-4" style="font-size: large; ">
                                     <label for="track">
                                    &nbsp;&nbsp;Enter Organization</label><br>
                                   
      
                                    <input type="text" class="form-control form-control-sm mr-1 " id="org2" name="org2">
                            </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                           <div class="form-group " style="font-size: large;">
                                     <label for="track">
                                    &nbsp;&nbsp;Enter User Type</label><br>
                                    <select class="form-control form-control-sm mr-1" name="usertype2" id="usertype2" required>
                                                         <option selected>Select User Type</option>
                                                           <option value="all">All</option>
                                                         <option value="Seed Producing">Seed Producing</option>
                                                         <option value="Retailer">Retailer</option>
                                                         <option value="Distributor">Distributor</option>
                                                         <option value="Wholesaler">Wholesaler</option>
                                                         </select>
                                                      
                            </div>
                          </div>
                           <div class="row">
                            <div class="form-group col-sm-4" style="font-size: large; ">
                                     <label for="track">
                                    &nbsp;&nbsp;Message Type</label><br>
                                    <select class="form-control form-control-sm mr-1" name="msgtype2" id="msgtype2" required>
                                                         <option selected>Message Priority</option>
                                                         <option value="primary">Very Low</option>
                                                         <option value="info">Low</option>
                                                         <option value="success">Medium</option>
                                                         <option value="warning">Important</option>
                                                        <option value="danger">Very Important</option></select>
      
                                   
                            </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                           <div class="form-group " style="font-size: large;">
                                     <label for="track">
                                    &nbsp;&nbsp;Enter Message</label><br>
                                <textarea  id="msg2" name="msg2" rows="4"  ></textarea>
                                
                            </div>
                          </div>
                           <button type="submit" name="submit2" id="submit2" class="btn btn-primary" >Send Message</button>
                         </form>
                </div></div>
                <?php }
                 else{?>
                  <div class="card">
              <div class="card-header">
                <h4 class="card-title">Track Order</h4></div>
                 <div class="card-body" >
                   <form action="" method="post" enctype="multipart/form-data">
                  <div class="row">
                            <div class="form-group col-sm-4" style="font-size: large; ">
                                     <label for="track">
                                    &nbsp;&nbsp;Enter Order Id</label><br>
                                 <input type="text" class="form-control form-control-sm mr-1 " id="track" name="track">
                            </div>   
                         </div>
                          <button type="submit" name="submit" id="submit" class="btn btn-primary" >Track</button>

      </form></div></div></div>
                                    
                    
            <!-- order start -->  
            <?php  
            if(isset($_POST['submit']))
            {
              $track=$_POST['track'];
$result11 = mysqli_query($conn,"SELECT * FROM orderfs where email='$user' and otoken='$track'");
 $row11 = mysqli_fetch_assoc($result11);
 $ostatus=$row11['ostatus'];
 $shipped=$row11['qty']; 
 $ud=$row11['udate']; 
 $t=$row11['otoken'];
 if($ostatus=='Unsend')
 {
  $a='completed';
  $b='';
  $c='';
  $d='';
  $e='Placed';

 }
 elseif($ostatus=='Sent')
 {
  $a='completed';
  $b='completed';
  $c='';
  $d='';
  $e='Dispatched';

 }
 elseif($ostatus=='Received')
 {
  $a='completed';
  $b='completed';
  $c='completed';
  $d='';
  $e='Received';
 }
 elseif($ostatus=='Done')
 {
  $a='completed';
  $b='completed';
  $c='completed';
  $d='completed';
  $e='Completed';
 }
 else
 {
  $a='';
  $b='';
  $c='';
  $d='';
  $e='No Details';
 }
 ?>
 
<div class="container padding-bottom-3x mb-1 " style="padding-left: 0px;padding-right: 0px;">
        <div class="card mb-3">
          <div class="p-4 text-center text-white text-lg bg-dark rounded-top"><span class="text-uppercase">Tracking Order No - </span><span class="text-medium"><?php echo"$t";?></span></div>
          <div class="d-flex flex-wrap flex-sm-nowrap justify-content-between py-3 px-2 bg-secondary">
            <div class="w-100 text-center py-1 px-2"><span class="text-medium">Ordered Jute Seeds (Kgs) </span><?php echo"$shipped";?></div>
            <div class="w-100 text-center py-1 px-2"><span class="text-medium">Status:</span> <?php echo"$e";?></div>
            <div class="w-100 text-center py-1 px-2"><span class="text-medium">Expected Date:</span><?php echo"$ud";?></div>
          </div>
          <div class="card-body">
            <div class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
              <div class="step <?php echo"$a";?>">
                <div class="step-icon-wrap">
                  <div class="step-icon"><i class="pe-7s-cart"></i></div>
                </div>
                <h4 class="step-title">Confirmed Order</h4>
              </div>
              <div class="step <?php echo"$b";?>">
                <div class="step-icon-wrap">
                  <div class="step-icon"><i class="pe-7s-config"></i></div>
                </div>
                <h4 class="step-title">Processing Order</h4>
              </div>
             
              <div class="step <?php echo"$c";?>">
                <div class="step-icon-wrap">
                  <div class="step-icon"><i class="pe-7s-car"></i></div>
                </div>
                <h4 class="step-title">Order Dispatched</h4>
              </div>
              <div class="step <?php echo"$d";?>">
                <div class="step-icon-wrap">
                  <div class="step-icon"><i class="pe-7s-home"></i></div>
                </div>
                <h4 class="step-title">Order Delivered</h4>
              </div>
            </div>
          </div>
        </div>
        
      </div>
<?php }
else{ ?>
  <div class="container padding-bottom-3x mb-1">
        <div class="card mb-3">
          <div class="p-4 text-center text-white text-lg bg-dark rounded-top"><span class="text-uppercase">Tracking Order No - </span><span class="text-medium">-</span></div>
          <div class="d-flex flex-wrap flex-sm-nowrap justify-content-between py-3 px-2 bg-secondary">
            <div class="w-100 text-center py-1 px-2"><span class="text-medium">Ordered Jute Seeds (Kgs) </span>-</div>
            <div class="w-100 text-center py-1 px-2"><span class="text-medium">Status:</span> -</div>
            <div class="w-100 text-center py-1 px-2"><span class="text-medium">Expected Date:</span>-</div>
          </div>
          <div class="card-body">
            <div class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
              <div class="step">
                <div class="step-icon-wrap">
                  <div class="step-icon"><i class="pe-7s-cart"></i></div>
                </div>
                <h4 class="step-title">Confirmed Order</h4>
              </div>
              <div class="step ">
                <div class="step-icon-wrap">
                  <div class="step-icon"><i class="pe-7s-config"></i></div>
                </div>
                <h4 class="step-title">Processing Order</h4>
              </div>
             
              <div class="step ">
                <div class="step-icon-wrap">
                  <div class="step-icon"><i class="pe-7s-car"></i></div>
                </div>
                <h4 class="step-title">Order Dispatched</h4>
              </div>
              <div class="step ">
                <div class="step-icon-wrap">
                  <div class="step-icon"><i class="pe-7s-home"></i></div>
                </div>
                <h4 class="step-title">Order Delivered</h4>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    <?php }}?>
      <!-- order finish -->

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
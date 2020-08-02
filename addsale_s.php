<?php
session_start();
include_once 'config/database.php';
if (isset($_SESSION['user'])) {
$user=$_SESSION['user'];
$result = mysqli_query($conn,"SELECT * FROM supplier where email='$user'");
 $row = mysqli_fetch_assoc($result);
 $user_status=$row['status'];
 $token=$row['token'];
  $user_type=$row['type'];
 $sorg=$row['org'];
 $phone=$row['phone'];
 $contactp=$row['contactp'];
if($user_type!='Official' && $user_status=='Active')
 {
if(isset($_POST['submit']))
{
  date_default_timezone_set('Asia/Kolkata');
    $email = $user;
    $org=$sorg;
    $supplier = $contactp;
    $seedtype = $_POST['seedtype'];
    $seed = $_POST['seed'];
    $qty = $_POST['qty'];
    $lot = $_POST['lot'];
    $bag = $_POST['bag'];
    $fname = $_POST['fname'];
    $fphone = $_POST['fphone'];
    $faddress = $_POST['faddress'];
    $pincode = $_POST['pincode'];
    $state = $_POST['state'];
    $mode = $_POST['mode'];
    $trackno = $_POST['trackno'];
   
      $result = "INSERT INTO sale (org, email, fname, seedtype, seed, qty, fphone, supplier, lot, bag, faddress, pincode, state, mode, trackno, created) VALUES ('$org', '$email', '$fname', '$seedtype', '$seed', '$qty', '$fphone', '$supplier', '$lot', '$bag', '$faddress', '$pincode', '$state', '$mode', '$trackno', now())";
    

    if ($conn->query($result) === TRUE) 
      {
          header("Location: viewsale_s.php");
        }
     else 
      {
         echo "Error: " . $result . "<br>" . $conn->error;
      }
}

$result2 = mysqli_query($conn,"SELECT ssid,seed,lot,bag,qty FROM seeds group by seed");
$result3 = mysqli_query($conn,"SELECT ssid,seed,seedtype,lot,germination,purity,bag,qty FROM seeds group by seed");


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
                <h4 class="card-title">Add Sales</h4>
                
              </div>
              <div class="card-body " >
                 <form action="" method="post" enctype="multipart/form-data">
                       <div class="row">
                            <div class="form-group col-sm-4" style="font-size: large; ">
                                     <label for="track">
                                    &nbsp;&nbsp;Farmer Name</label><br>
                                    <input type="text" class="form-control form-control-sm mr-1" id="fname" name="fname">
                            </div>
                             <div class="form-group col-sm-4" style="font-size: large;">
                                     <label for="track">
                                    &nbsp;&nbsp;Farmer's Contact no</label><br>
                                    <input type="number" class="form-control form-control-sm mr-1 "id="fphone" name="fphone" required="" >
                            </div>
                            </div>
                            <div class="row">
                            <div class="form-group col-sm-4" style="font-size: large; ">
                                     <label for="track">
                                    &nbsp;&nbsp;Farmer's Address</label><br>
                                    <input type="text" class="form-control form-control-sm mr-1" id="faddress" name="faddress" required>
                            </div>
                             <div class="form-group col-sm-4" style="font-size: large;">
                                     <label for="track">
                                    &nbsp;&nbsp;Farmer's Area Pincode</label><br>
                                    <input type="number" class="form-control form-control-sm mr-1" id="pincode" name="pincode" required >
                            </div>
                            </div>
                            <div class="row">
                              <div class="form-group col-sm-4" style="font-size: large;">
                                     <label for="track">
                                    &nbsp;&nbsp;Farmer's State</label><br>
                                    <input type="text" class="form-control form-control-sm mr-1" id="state" name="state" required >
                            </div>
                              <div class="form-group col-sm-4" style="font-size: large; ">
                                &nbsp;&nbsp; &nbsp;&nbsp;    
                                <label>Seed Type:</label>
                                <select class="form-control" name="seedtype" id="seedtype" required>
                                  <option selected>Select Seed Type</option>
                                  <?php
                                  if ($result3->num_rows > 0) {
                                  // output data of each row
                                    while($row2 = $result3->fetch_assoc()) {
                                      ?>
                                      <option value="<?php echo($row2['seedtype']); ?>"><?php echo($row2['seedtype']); ?></option>
                  
                                                        <?php }
                                                      }else{
                                                        echo "record not found";
                                                      }
                                                      ?>
                                                                                                     
                                               </select>
                                                    
                                                  </div>
                            </div>
                            <div class="row">
                              <div class="form-group col-sm-4" style="font-size: large; ">
                                <label >Seed</label>
                                  <select class="form-control" name="seed" id="seed" required>
                                    <option selected>Select Seed Name</option>
                                      </select>
                                        </div>
                                        <div class="form-group col-sm-4" style="font-size: large; ">
                                          &nbsp;&nbsp; &nbsp;&nbsp;
                                          <label>LOT No.</label>
                                          &nbsp;&nbsp; &nbsp;&nbsp;
                                          <select class="form-control" name="lot" id="lot" required>
                                          <option selected>Select Lot No.</option>
                                          </select>
                                        </div>
                            </div>

                             <div class="row">
                              <div class="form-group col-sm-4" style="font-size: large; ">
                                &nbsp;&nbsp; &nbsp;&nbsp;            
                                <label>Bag No.</label>
                                &nbsp;&nbsp; &nbsp;&nbsp;            
                                <select class="form-control" name="bag" id="bag" required>
                                <option selected>Select Bag No.</option>
                                </select>
                              </div>
                              <div class="form-group col-sm-4" style="font-size: large; ">
                                <label for="track">
                                &nbsp;&nbsp;Seed Quantity</label><br>
                                <input type="text" name="qty" id="qty" value="" class="form-control form-control-sm mr-1" >
                            </div>
                            </div>

                            <div class="row">
                              <div class="form-group col-sm-4" style="font-size: large; ">
                                &nbsp;&nbsp; &nbsp;&nbsp;            
                                <label>Mode Of Sale</label>
                                &nbsp;&nbsp; &nbsp;&nbsp;            
                                <select class="form-control" name="mode" id="mode" required>
                                <option selected>Select Mode Of Sale</option>
                                <option value="Online">Online</option>
                                <option value="Offline">Offline</option>
                                <option value="Phone">Phone</option>
                                </select>
                              </div>
                              <div class="form-group col-sm-4" style="font-size: large; ">
                                <label for="track">
                                &nbsp;&nbsp;Tracking Number</label><br>
                                <input type="text" name="trackno" id="trackno" value="" class="form-control form-control-sm mr-1" >
                            </div>
                            </div>
                           
                        
                        &nbsp;&nbsp; &nbsp;&nbsp;  <button type="submit" name="submit" id="submit" class="btn btn-primary" >Add Details</button>
                            
                       
                    </form>  
               
                        
                           
                           
                        
                
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
   <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      $('#example').DataTable();
    });
  </script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="sassets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="sassets/demo/demo.js"></script>

<script type="text/javascript">
$(document).ready(function(){

    $("#seed").change(function(){
        var seed = $(this).val();

        $.ajax({
            url: 'get_lot.php',
            type: 'post',
            data: {seed:seed},
            dataType: 'json',
            success:function(response){

                var len = response.length;


                $("#lot").empty();
                for( var i = 0; i<len; i++){
                    var ssid = response[i]['ssid'];
                    var lot = response[i]['lot'];
                    
                    $("#lot").append("<option value='"+lot+"'>"+lot+"</option>");

                }
            }
        });
    });

});

</script>


 <script type="text/javascript">
$(document).ready(function(){

    $("#seedtype").change(function(){
        var seedtype = $(this).val();

        $.ajax({
            url: 'get_seed.php',
            type: 'post',
            data: {seedtype:seedtype},
            dataType: 'json',
            success:function(response){

                var len = response.length;


                $("#seed").empty();
                for( var i = 0; i<len; i++){
                    var seed = response[i]['seed'];
                      var lot = response[i]['lot'];
                    
                    
                    $("#seed").append("<option value='"+seed+"'>"+seed+"</option>");
                     $("#lot").append("<option value='"+lot+"'>"+lot+"</option>");

                }
            }
        });
    });

});

</script>




<script type="text/javascript">
$(document).ready(function(){

    $("#lot").change(function(){
        var lot = $(this).val();

        $.ajax({
            url: 'get_bag.php',
            type: 'post',
            data: {lot:lot},
            dataType: 'json',
            success:function(response){

                var len = response.length;


                $("#bag").empty();
                for( var i = 0; i<len; i++){
                    var ssid = response[i]['ssid'];
                    var bag = response[i]['bag'];
                     var qty = response[i]['qty'];
                    var germination = response[i]['germination'];
                    var purity = response[i]['purity'];
                    var insofficer=response[i]['insofficer'];
                    
                    $("#bag").append("<option value='"+bag+"'>"+bag+"</option>");
                     $("#qty").append("<option value='"+qty+"'>"+qty+"</option>");
                     $("#germination").append("<option value='"+germination+"'>"+germination+"</option>");
                      $("#purity").append("<option value='"+purity+"'>"+purity+"</option>");
                       $("#insofficer").append("<option value='"+insofficer+"'>"+insofficer+"</option>");


                }
            }
        });
    });

});

</script>

<script type="text/javascript">
$(document).ready(function(){

    $("#bag").change(function(){
        var bag = $(this).val();

        $.ajax({
            url: 'get_qty.php',
            type: 'post',
            data: {bag:bag},
            dataType: 'json',
            success:function(response){

                var len = response.length;


                $("#qty").empty();
                 $("#germination").empty();
                  $("#purity").empty();
                for( var i = 0; i<len; i++){
                    var ssid = response[i]['ssid'];
                    var qty = response[i]['qty'];
                    var germination = response[i]['germination'];
                    var purity = response[i]['purity'];
                    var insofficer=response[i]['insofficer'];
                    
                    $("#qty").append("<option value='"+qty+"'>"+qty+"</option>");
                     $("#germination").append("<option value='"+germination+"'>"+germination+"</option>");
                      $("#purity").append("<option value='"+purity+"'>"+purity+"</option>");
                       $("#insofficer").append("<option value='"+insofficer+"'>"+insofficer+"</option>");

                }
            }
        });
    });

});

</script>

<script type="text/javascript">
$(document).ready(function(){
$('#bag').change(function(){
    $.get('get_quantity.php',{bag:$(this).val()},function(data){
    $('#qty').val(data);
    
 });
});
});
</script>

</body>

</html>
<?php 
}
}
else{
  header("location: ./login.php");
}?>
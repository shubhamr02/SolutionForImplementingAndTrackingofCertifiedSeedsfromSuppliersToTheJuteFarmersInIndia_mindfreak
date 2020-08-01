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
if($user_type=='Official')
 {
if(isset($_POST['submit']))
{
  date_default_timezone_set('Asia/Kolkata');
    $email = $user;
    $org=$sorg;
    $supplier = $contactp;
     $seedtype=$_POST['seedtype'];
    $seed = $_POST['seed'];
    $qty = $_POST['qty'];
    $germination = $_POST['germination'];
    $purity = $_POST['purity'];
    $lot = $_POST['lot'];
    $insofficer = $_POST['insofficer'];
    $bag = $_POST['bag'];

    $filename = $_FILES['myfile']['name'];
    $filename2 = $_FILES['myfile2']['name'];
    // destination of the file on the server
    $destination = 'uploads/' . $filename;
    $destination2 = 'uploads/' . $filename2;
    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    $extension2 = pathinfo($filename2, PATHINFO_EXTENSION);
    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    $file2 = $_FILES['myfile2']['tmp_name'];
    $size2 = $_FILES['myfile2']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx' ,'pptx','png','jpg','jpeg','bmp'])) {
        echo "You file extension must be .zip, .pdf, .png, .jpg, .jpeg, ,bmp or .docx";
        }
        elseif (!in_array($extension2, ['zip', 'pdf', 'docx' ,'pptx','png','jpg','jpeg','bmp'])) {
        echo "You file extension must be .zip, .pdf, .png, .jpg, .jpeg, ,bmp or .docx";
      

    } elseif ($_FILES['myfile']['size'] > 40000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
}
        elseif ($_FILES['myfile2']['size'] > 40000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";

    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination) && move_uploaded_file($file2, $destination2))  {
      $result = "INSERT INTO inventory (org, email, supplier, seedtype, seed, qty, germination, purity, lot, insofficer, bag, certificate, analysis, created) VALUES ('$org', '$email', '$supplier','$seedtype', '$seed', '$qty', '$germination', '$purity', '$lot', '$insofficer', '$bag', '$filename','$filename2',now())";
    }else
    {
      echo '<script>alert("Something went wrong in file upload")</script>'; 
    }
   

    if ($conn->query($result) === TRUE) 
      {
          header("Location: viewseed.php");
        }
     else 
      {
         echo "Error: " . $result . "<br>" . $conn->error;
      }
}
}

$result2 = mysqli_query($conn,"SELECT ssid,seed,seedtype,lot,germination,purity,bag,qty FROM seeds group by seed");

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
                <h4 class="card-title">Add Seed Inventory</h4>
                
              </div>
              <div class="card-body " >
                <form action="" method="post" enctype="multipart/form-data">
                       <div class="row">
                            <div class="form-group col-sm-4" style="font-size: large; ">
                                                  &nbsp;&nbsp; &nbsp;&nbsp;    <label>Seed Type:</label>
                                                       <select class="form-control" name="seedtype" id="seedtype" required>
                                                         <option selected>Select Seed Type</option>
                                                       <?php
                                                         if ($result2->num_rows > 0) {
                                                          // output data of each row
                                                          while($row1 = $result2->fetch_assoc()) {
                                                        ?>
                                                       <option value="<?php echo($row1['seedtype']); ?>"><?php echo($row1['seedtype']); ?></option>
                  
                                                        <?php }
                                                      }else{
                                                        echo "record not found";
                                                      }
                                                      ?>
                                                                                                     
                                               </select>
                                                    
                                                  </div>
                                                  <div class="form-group col-sm-4" style="font-size: large; ">
                                    <label >Seed</label>
                                       <select class="form-control" name="seed" id="seed" required>
                                          <option selected>Select Seed Name</option>
                                          </select>
                                           </div>
                         
                               <!-- <div class="form-group col-sm-4" style="font-size: large; ">
                                                  &nbsp;&nbsp; &nbsp;&nbsp;    <label>Seed Name:</label>
                                                       <select class="form-control" name="seed" id="seed" required>
                                                         <option selected>Select Seed Name</option>
                                                       <?php
                                                         if ($result3->num_rows > 0) {
                                                          // output data of each row
                                                          while($row2 = $result3->fetch_assoc()) {
                                                        ?>
                                                       <option value="<?php echo($row2['seed']); ?>"><?php echo($row2['seed']); ?></option>
                  
                                                        <?php }
                                                      }else{
                                                        echo "record not found";
                                                      }
                                                      ?>
                                                                                                     
                                               </select>
                                                    
                                                  </div>-->
                                    </div>
                                    <div class="row">
                                  <div class="form-group col-sm-4" style="font-size: large; ">
                                    <label >LOT No.</label>
                                       <select class="form-control" name="lot" id="lot" required>
                                          <option selected>Select Lot No.</option>
                                          </select>
                                           </div>
                         
                                <div class="form-group col-sm-4" style="font-size: large; ">
                                    <label >Bag No.</label>
                                       <select class="form-control" name="bag" id="bag" required>
                                          <option selected>Select Bag No.</option>
                                          </select>
                                           </div>
                                    </div>
                                     <div class="row">
                                  <!--<div class="form-group col-sm-4" style="font-size: large; ">
                                    <label >Purity (%)</label>
                                       <select class="form-control" name="purity" id="purity" required>
                                          <option selected>Select Purity</option>
                                          </select>
                                           </div>-->
                                            <div class="form-group col-sm-4" style="font-size: large; ">
                                     <label for="track">
                                    &nbsp;&nbsp;Enter Purity</label><br>
                                    <input type="text" name="purity" id="purity" class="form-control form-control-sm mr-1" >
                            </div>
                                            <div class="form-group col-sm-4" style="font-size: large; ">
                                     <label for="track">
                                    &nbsp;&nbsp;Enter Germination</label><br>
                                    <input type="text" name="germination" id="germination"  class="form-control form-control-sm mr-1" >
                            </div>
                        
                               <!-- <div class="form-group col-sm-4" style="font-size: large; ">
                                    <label >Germination (%)</label>
                                       <select class="form-control" name="germination" id="germination" required>
                                          <option selected>Select Germination</option>
                                          </select>
                                           </div>-->
                                    </div>
                                        
                          
                          <div class="row">
                            <!-- <div class="form-group col-sm-4" style="font-size: large; ">
                                    <label >Quantity (Kgs)</label>
                                       <select class="form-control" name="qty" id="qty" required>
                                          <option selected>Select Quantity</option>
                                          </select>
                                           </div>-->
                                            <div class="form-group col-sm-4" style="font-size: large; ">
                                     <label for="track">
                                    &nbsp;&nbsp;Seed Quantity</label><br>
                                    <input type="text" name="qty" id="qty"  class="form-control form-control-sm mr-1" >
                            </div>
                                           
                            <div class="form-group col-sm-4" style="font-size: large; ">
                                     <label for="track">
                                    &nbsp;&nbsp;Enter Seed Inspection Officer</label><br>
                                    <input type="text" name="insofficer" id="insofficer"  class="form-control form-control-sm mr-1" >
                            </div>
                          
                          </div>
                          <div class="row">
                            <div class="form-group col-sm-4" style="font-size: large; ">
                                     <label for="track">
                                    &nbsp;&nbsp;Certificate</label><br>
                                   
                                       <div class="input-group">
                              <div class="custom-file">
                                     <input type="file" name="myfile" id="myfile" class="form-control form-control-sm mr-1" 
                                    aria-describedby="inputGroupFileAddon01" required>
                                     <label class="custom-file-label" for="myfile">Choose file</label>
                                       </div>
                                      </div>
                            </div>
                           <div class="form-group col-sm-4" style="font-size: large;">
                                     <label for="track">
                                    &nbsp;&nbsp;Seed Analysis Report</label><br>
                                                                      
                                      <div class="input-group">
                              <div class="custom-file">
                                     <input type="file" name="myfile2" id="myfile2" class="form-control form-control-sm mr-1"
                                    aria-describedby="inputGroupFileAddon01" required>
                                     <label class="custom-file-label" for="myfile2">Choose file</label>
                                       </div>
                                      </div>
                            </div>
                          </div>
                        &nbsp;&nbsp; &nbsp;&nbsp;  <button type="submit" name="submit" id="submit" class="btn btn-primary" >Add to Inventory</button>
                            
                       
                    </form>        
                           
                        
                
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
                   
                    $("#qty").append("<option value='"+qty+"'>"+qty+"</option>");
                     $("#germination").append("<option value='"+germination+"'>"+germination+"</option>");
                      $("#purity").append("<option value='"+purity+"'>"+purity+"</option>");
                      
                }
            }
        });
    });

});

</script>

<script type="text/javascript">
$(document).ready(function(){
$('#lot').change(function(){
    $.get('get_insofficer.php',{lot:$(this).val()},function(data){
    $('#insofficer').val(data);

 });
});
});
</script>

<script type="text/javascript">
$(document).ready(function(){
$('#bag').change(function(){
    $.get('get_purity.php',{bag:$(this).val()},function(data){
    $('#purity').val(data);
    
 });
});
});
</script>

<script type="text/javascript">
$(document).ready(function(){
$('#bag').change(function(){
    $.get('get_germination.php',{bag:$(this).val()},function(data){
    $('#germination').val(data);
    
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
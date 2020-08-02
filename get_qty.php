<?php 

include "database.php";

$bag =$_POST['bag'];   // department id

$sql = "SELECT qty,purity,insofficer,germination,bag FROM seeds where bag='$bag'";

$result = mysqli_query($conn,$sql);

$users_arr = array();


while( $row = mysqli_fetch_array($result) ){
 
   $qty = $row['qty'];
   $germination=$row['germination'];
   $purity=$row['purity'];
   $insofficer=$row['insofficer'];

   $users_arr[] = array("qty" => $qty,"germination" => $germination,"purity" => $purity,"insofficer" => $insofficer);
}

// encoding array to json format
echo json_encode($users_arr);
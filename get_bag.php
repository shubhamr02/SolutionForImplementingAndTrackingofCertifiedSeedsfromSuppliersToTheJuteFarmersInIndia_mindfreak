<?php 

include "database.php";

$lot =$_POST['lot'];   // department id

$sql = "SELECT lot,bag,purity,germination,qty,insofficer FROM seeds group by bag having lot='$lot'";

$result = mysqli_query($conn,$sql);

$users_arr = array();


while( $row = mysqli_fetch_array($result) ){
 
   $bag = $row['bag'];
   $germination=$row['germination'];
   $purity=$row['purity'];
   
  $insofficer=$row['insofficer'];	
   
   $qty=$row['qty'];

   $users_arr[] = array("bag" => $bag,"germination" => $germination,"purity" => $purity,"insofficer" => $insofficer,"qty"=>$qty);
}

// encoding array to json format
echo json_encode($users_arr);
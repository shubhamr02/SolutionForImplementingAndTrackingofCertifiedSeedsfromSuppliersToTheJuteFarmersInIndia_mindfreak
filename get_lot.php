<?php 

include "database.php";

$seed =$_POST['seed'];   // department id

$sql = "SELECT seed,lot FROM seeds group by lot having seed='$seed'";

$result = mysqli_query($conn,$sql);

$users_arr = array();


while( $row = mysqli_fetch_array($result) ){
 
   $lot = $row['lot'];

   $users_arr[] = array("lot" => $lot);
}

// encoding array to json format
echo json_encode($users_arr);
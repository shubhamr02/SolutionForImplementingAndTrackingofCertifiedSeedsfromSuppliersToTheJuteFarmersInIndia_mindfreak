<?php 

include "database.php";

$seedtype =$_POST['seedtype'];   // department id

$sql = "SELECT seedtype,seed,lot FROM seeds group by seed having seedtype='$seedtype'";

$result = mysqli_query($conn,$sql);

$users_arr = array();


while( $row = mysqli_fetch_array($result) ){
 
   $seed = $row['seed'];
   $lot = $row['lot'];

   $users_arr[] = array("seed" => $seed,"lot" => $lot);
}

// encoding array to json format
echo json_encode($users_arr);
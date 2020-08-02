<?php 

include "database.php";

if(isset($_REQUEST['lot'])){
 $lot=$_REQUEST['lot'];
    $result = mysqli_query($conn,"SELECT insofficer,lot from seeds group by insofficer having lot ='$lot'");
 $row = mysqli_fetch_assoc($result);
    echo $row['insofficer'];
   
    die;
}
?>
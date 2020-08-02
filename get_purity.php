<?php 

include "database.php";

if(isset($_REQUEST['bag'])){
 $bag=$_REQUEST['bag'];
    $result = mysqli_query($conn,"SELECT purity,bag from seeds group by purity having bag ='$bag'");
 $row = mysqli_fetch_assoc($result);
    echo $row['purity'];
   
    die;
}
?>
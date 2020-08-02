<?php 

include "database.php";

if(isset($_REQUEST['bag'])){
 $bag=$_REQUEST['bag'];
    $result = mysqli_query($conn,"SELECT qty,bag from seeds where bag ='$bag'");
 $row = mysqli_fetch_assoc($result);
    echo $row['qty'];
   
    die;
}
?>
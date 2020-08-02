<?php 

include "database.php";

if(isset($_REQUEST['bag'])){
 $bag=$_REQUEST['bag'];
    $result = mysqli_query($conn,"SELECT germination,bag from seeds group by germination having bag ='$bag'");
 $row = mysqli_fetch_assoc($result);
    echo $row['germination'];
   
    die;
}
?>
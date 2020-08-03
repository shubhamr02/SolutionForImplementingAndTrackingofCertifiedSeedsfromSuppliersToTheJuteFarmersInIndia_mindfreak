<?php
session_start();
include_once 'database.php';
if (isset($_SESSION['user'])) {
$user=$_SESSION['user'];
$result = mysqli_query($conn,"SELECT * FROM supplier where email='$user'");
 $row = mysqli_fetch_assoc($result);
 $user_status=$row['status'];
 $token=$row['token'];
  $user_type=$row['type'];
$result3 = mysqli_query($conn,"SELECT * FROM sale where email='$user'");
if($user_type!='Official' && $user_status=='Active')
 {
 ?>
  
                   <?php 

                    
                    if ($result3->num_rows > 0) {
                    // output data of each row
                    while($row1 = $result3->fetch_assoc()) {
                      $temp = $row1['fphone'];
                      echo" <tr>";
                      echo"<td>".$row1['fname']."</td>";
                      echo"<td>".$row1['seedtype']."</td>"; 
                      echo"<td>".$row1['seed']."</td>"; 
                      echo"<td>".$row1['qty']."</td>"; 
                      echo"<td>".$row1['fphone']."</td>"; 
                      echo"<td>".$row1['supplier']."</td>"; 
                      echo"<td>".$row1['lot']."</td>"; 
                      echo"<td>".$row1['bag']."</td>";
                      echo"<td>".$row1['faddress']."</td>";
                      echo"<td>".$row1['pincode']."</td>";
                      echo"<td>".$row1['state']."</td>";
                      $rfv = "https://track.aftership.com/?tracking-numbers=".$row1['trackno'];

                      if (isset($_GET['hello'])) {
                          echo $temp;
                      }
                      echo "<td><a href='viewsale_s.php?hello=true' role='button' class='btn btn-block btn-primary'> SMS </a></td>";
                      ?>
                      <td><a href="<?php echo $rfv; ?>" role="button" class="btn btn-block btn-primary" target="_blank">Track </a></td>
                      <?php

                      ?>
                      <!-- <td><a href="viewsale_s.php" role="button" class="btn btn-block btn-primary"> SMS </a></td> -->
                      <?php
                        
                        echo "</tr>"; 
                       }
                        }
                        ?>
                     
  <script src="sassets/js/core/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      $('#example').DataTable();
    });
  </script>
  

</html>
<?php 
}
}
else{
  header("location: ./login.php");
}?>
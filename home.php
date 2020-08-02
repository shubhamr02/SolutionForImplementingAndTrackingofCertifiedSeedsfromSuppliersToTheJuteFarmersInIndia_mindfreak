<?php
session_start();
include_once 'config/database.php';
if (isset($_SESSION['user'])) {
$user=$_SESSION['user'];
$result = mysqli_query($conn,"SELECT * FROM supplier where email='$user'");
 $row = mysqli_fetch_assoc($result);
 $user_status=$row['status'];
 $token=$row['token'];
 if($user_status=="Active")
 {
 header("Location: dashboard_s.php");
}
else
{
	echo "Your Account is under review we will send an email after review completion";
	?><br>
	<br>
	<br><a href="index.php" style="font-size:18px; color:green;">Home</a><?php
} 
}
else {

   echo "get out Buddy pls come back after login!!!!";
?>
<br/><br/>
<b><a href="index.php" style="font-size:18px; color:green;">Login</a>  |||

<a href="signup.php" style="font-size:18px; color: orange;">Create An Accout</a>
</b>
<?php
 }
?>
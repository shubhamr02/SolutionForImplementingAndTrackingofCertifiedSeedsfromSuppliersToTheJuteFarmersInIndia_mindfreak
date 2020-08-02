



<div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <a href="http://fleetywebsolutions.epizy.com"><i class="now-ui-icons ui-1_zoom-bold"></i></a>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              <?php
include_once 'config/database.php';
if (isset($_SESSION['user'])) {
$user=$_SESSION['user'];
$result = mysqli_query($conn,"SELECT * FROM off_inventory where official='$user'");
 $row = mysqli_fetch_assoc($result);
  $official=$row['official'];

if($user!=$official)
{
$result2 = mysqli_query($conn,"SELECT * FROM off_inventory where email='$user' and status='Sent'");
 $row2 = mysqli_num_rows($result2);
 if($row2==0)
 {
  ?> <li class="nav-item">
                <a class="nav-link" href="./notifications.php">
                  <i class="now-ui-icons ui-1_bell-53"> </i>
                  <p>
                    <span class="d-lg-none d-md-block">Notifications</span>
                  </p>
                </a>
              </li>

  <?php
 }
 else
 {
  ?>
  <li class="nav-item">
                <a class="nav-link" href="./notifications.php">
                  <i class="now-ui-icons ui-1_bell-53"> <span class="badge" style="
  position: absolute;
  top: -10px;
  right: -10px;
  padding: 2px 6px;
  border-radius: 50%;
  background: red;
  color: white;
"><?php echo "$row2";?></span></i>
                  <p>
                    <span class="d-lg-none d-md-block">Notifications</span>
                  </p>
                </a>
              </li>

<?php
 }

?>
               <?php }
              else{ 
                $result5 = mysqli_query($conn,"SELECT * FROM off_inventory where official='$user' and status='Received'");
               $row5 = mysqli_num_rows($result5);
               if($row5==0)
 {
  ?> <li class="nav-item">
                <a class="nav-link" href="./notifications.php">
                  <i class="now-ui-icons ui-1_bell-53"> </i>
                  <p>
                    <span class="d-lg-none d-md-block">Notifications</span>
                  </p>
                </a>
              </li>

  <?php
 }
 else
 {
  ?>
  <li class="nav-item">
                <a class="nav-link" href="./notifications.php">
                  <i class="now-ui-icons ui-1_bell-53"> <span class="badge" style="
  position: absolute;
  top: -10px;
  right: -10px;
  padding: 2px 6px;
  border-radius: 50%;
  background: red;
  color: white;
"><?php echo "$row5";?></span></i>
                  <p>
                    <span class="d-lg-none d-md-block">Notifications</span>
                  </p>
                </a>
              </li>

<?php
 }

            }
          }
?>
              <!--<li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="now-ui-icons location_world"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>-->
               <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Profile</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="./view.php"><i class='fas fa-user-circle' style='font-size:24px'></i>View Profie</a>
                  <a class="dropdown-item" href="./user.php"> <i class="fa fa-edit" style="font-size:24px" aria-hidden="true"></i>Edit Profie</a>
                  <a class="dropdown-item" href="./changepass.php"> <i class="fa fa-lock" style="font-size:24px" aria-hidden="true"></i>Change Password</a>
          
                  <a class="dropdown-item" href="./logout.php"><i style="font-size:24px" class="fa">&#xf011;</i>Logout</a>
                </div>
              </li>
            </ul>
          </div>
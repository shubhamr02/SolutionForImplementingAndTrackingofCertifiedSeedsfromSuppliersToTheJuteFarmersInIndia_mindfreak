
<?php
require('database.php');
//$db = Database::getInstance();
//$mysqli = $db->getConnection();
class DbFunction{
	
	function login($loginid,$password){
	
      if(!ctype_alpha($loginid) || !ctype_alpha($password)){
      	
        echo "<script>alert('Either LoginId or Password is Missing')</script>";
      
      }		
   else{		
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "SELECT loginid, password FROM tbl_login where loginid=? and password=? ";
	$stmt= $mysqli->prepare($query);
	if(false===$stmt){
		
		trigger_error("Error in query: " . mysqli_connect_error(),E_USER_ERROR);
	}
	
	else{
		
		$stmt->bind_param('ss',$loginid,$password);
		$stmt->execute();
		$stmt -> bind_result($loginid,$password);
		$rs=$stmt->fetch();
		if(!$rs)
		{
			echo "<script>alert('Invalid Details')</script>";
			header('location:login.php');
		}
		else{
			
			header('location:add-blog.php');
		}
	}
	
	}
	
	}
	
	
		//create blog
		function create_blog($bname,$bdesc,$link,$bcat)
		{
			if($bname=="")
			{
				echo "<script>alert('Enter Blog Name')</script>";
			}
			else if($bdesc=="")
			{
				echo "<script>alert('Enter Blog Description')</script>";
			}
			else if($link=="")
			{
				echo "<script>alert('Enter Blog Link')</script>";
			}
			else if($bcat=="")
			{
				echo "<script>alert('select Blog Category')</script>";
			}
			else
			{
			$db = Database::getInstance();
			$mysqli = $db->getConnection();
			$query = "insert into blog(bname,bdesc,link,bcat)
			values(?,?,?,?)";
			$stmt= $mysqli->prepare($query);
			if(false===$stmt){
			
				trigger_error("Error in query: " . mysqli_connect_error(),E_USER_ERROR);
			}
			
			else{
			
				$stmt->bind_param('ssss',$bname,$bdesc,$link,$bcat);
				$stmt->execute();
				echo '<script>'; 
    			echo 'alert("Blog added Successfully")'; 
    			echo '</script>';
				
					
			}

		}

		}
		// create blog Category
		function create_blogcat($bcat)
		{
			if($bcat=="")
			{
				echo "<script>alert('Enter Blog Category')</script>";
			}
			else
			{
			$db = Database::getInstance();
			$mysqli = $db->getConnection();
			$query = "insert into blogcat(bcategory)
			values(?)";
			$stmt= $mysqli->prepare($query);
			if(false===$stmt){
			
				trigger_error("Error in query: " . mysqli_connect_error(),E_USER_ERROR);
			}
			
			else{
			
				$stmt->bind_param('s',$bcat);
				$stmt->execute();
				echo '<script>'; 
    			echo 'alert("Blog Category added Successfully")'; 
    			echo '</script>';
				
					
			}

		}
		}

		//suggestion insert
		function create_suggestion($email,$topic)
		{
			if($email=="")
			{
				echo "<script>alert('Enter E-mail')</script>";
			}
			else if($topic=="")
			{
				echo "<script>alert('Enter Topic')</script>";
			}
			else
			{
			$db = Database::getInstance();
			$mysqli = $db->getConnection();
			$query = "insert into suggestions(email,topic)
			values(?,?)";
			$stmt= $mysqli->prepare($query);
			if(false===$stmt){
			
				trigger_error("Error in query: " . mysqli_connect_error(),E_USER_ERROR);
			}
			
			else{
			
				$stmt->bind_param('ss',$email,$topic);
				$stmt->execute();
				echo '<script>'; 
    			echo 'alert("Suggestion sent Successfully")'; 
    			echo '</script>';
				
					
			}

		}	
		
		}

		//send email
		function send_email($email)
		{
			if($email=="")
			{
				echo "<script>alert('Enter E-mail')</script>";
			}
			
			else
			{
			$db = Database::getInstance();
			$mysqli = $db->getConnection();
			$query = "insert into mail(email)
			values(?)";
			$stmt= $mysqli->prepare($query);
			if(false===$stmt){
			
				trigger_error("Error in query: " . mysqli_connect_error(),E_USER_ERROR);
			}
			
			else{
			
				$stmt->bind_param('s',$email);
				$stmt->execute();
				echo '<script>'; 
    			echo 'alert("Than you!! Email-Id sent Successfully")'; 
    			echo '</script>';
				
					
			}

		}	
		
		}

		//feedback insert

function create_feedback($name,$email,$subject,$message){
		
		if($name==""){
			 
			echo "<script>alert('Enter Name')</script>";
		
		}
		
		
		else if($message==""){
			 
			echo "<script>alert('Enter message')</script>";
		
		}
		else{
			
			
			$db = Database::getInstance();
			$mysqli = $db->getConnection();
			$query = "insert into feedback(name,email,subject,message)
			values(?,?,?,?)";
			$stmt= $mysqli->prepare($query);
			if(false===$stmt){
			
				trigger_error("Error in query: " . mysqli_connect_error(),E_USER_ERROR);
			}
			
			else{
			
				$stmt->bind_param('ssss',$name,$email,$subject,$message);
				$stmt->execute();
				echo '<script>'; 
    			echo 'alert("Message sent Successfully")'; 
    			echo '</script>';
				
					
			}

		}	
				
		}

		//end of feedback insert
//show blog Category
		function showsup()
		{
			$db = database::getInstance();
			$mysqli = $db->getConnection();
			$query = "SELECT * FROM supplier";
			$stmt= $mysqli->query($query);
			return $stmt;
		}
		// show blog
		function showblog()
		{
			$db = Database::getInstance();
			$mysqli = $db->getConnection();
			$query = "SELECT * FROM blog";
			$stmt= $mysqli->query($query);
			return $stmt;
		}
		//show blog by id
		function sblog($id)
		{
			$db = Database::getInstance();
			$mysqli = $db->getConnection();
			$query = "SELECT * FROM blog where bid=$id";
			$stmt= $mysqli->query($query);
			return $stmt;
		}




function showfeedback(){
	
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "SELECT * FROM feedback ";
	$stmt= $mysqli->query($query);
	return $stmt;
	
}





function showSession(){
	
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "SELECT * FROM session  ";
	$stmt= $mysqli->query($query);
	return $stmt;
	
}

//show suggestion
function showsuggestion(){
	
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "SELECT * FROM suggestions ";
	$stmt= $mysqli->query($query);
	return $stmt;
	
}	
//show blog category
function showblogcat(){
	
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "SELECT * FROM blogcat ";
	$stmt= $mysqli->query($query);
	return $stmt;
	
}	
function showStudents1($id){
	
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "SELECT * FROM registration  where id='".$id."'";
	$stmt= $mysqli->query($query);
	return $stmt;
	
}	
//show emails
function showmails()
		{
			$db = Database::getInstance();
			$mysqli = $db->getConnection();
			$query = "SELECT * FROM mail";
			$stmt= $mysqli->query($query);
			return $stmt;
		}

//edit blog
function edit_blog($bname,$bdesc,$link,$bcat,$id)
{
			if($bname=="")
			{
				echo "<script>alert('Enter Blog Name')</script>";
			}
			else if($bdesc=="")
			{
				echo "<script>alert('Enter Blog Description')</script>";
			}
			else if($link=="")
			{
				echo "<script>alert('Enter Blog Link')</script>";
			}
			else if($bcat=="")
			{
				echo "<script>alert('select Blog Category')</script>";
			}
			else
			{
			$db = Database::getInstance();
			$mysqli = $db->getConnection();
			$query = "update blog set bname='$bname',bdesc='$bdesc',link='$link',bcat='$bcat' where bid='$id'";
			$stmt= $mysqli->prepare($query);
			if(false===$stmt){
			
				trigger_error("Error in query: " . mysqli_connect_error(),E_USER_ERROR);
			}
			
			else{
			
				$stmt->bind_param('ssssi',$bname,$bdesc,$link,$bcat,$id);
				$stmt->execute();
				echo '<script>'; 
    			echo 'alert("Blog Updated Successfully")'; 
    			echo '</script>';
				
					
			}

		}header ( 'location:../pages/view-blogs.php' );

		}
function edit_course($name,$address,$contact,$height,$weight,$waist,$weightp,$id){

    $db = Database::getInstance();
	$mysqli = $db->getConnection();
	//echo $cshort.$cfull.$udate.$id;exit;
	$query = "update tbl_course set name=?,address=? ,contact=? ,height=? ,weight=? ,waist=? ,weightp=? where cid=?";
	$stmt= $mysqli->prepare($query);
	$stmt->bind_param('sssssssi',$name,$address,$contact,$height,$weight,$waist,$weightp,$id);
	$stmt->execute();
    echo '<script>'; 
    echo 'alert("Student Details Updated Successfully")'; 
    echo '</script>';

 	 header ( 'location:../pages/view-course.php' );

}


function edit_subject($sub1,$sub2,$sub3,$udate,$id){

    $db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "update subject set sub1=?,sub2=? ,sub3=?,update_date=? where subid=?";
	$stmt= $mysqli->prepare($query);
	$stmt->bind_param('ssssi',$sub1,$sub2,$sub3,$udate,$id);
	$stmt->execute();
    echo '<script>'; 
    echo 'alert("Subject Updated Successfully")'; 
    echo '</script>';

}

function edit_std($cshort,$cfull,$fname,$mname,$lname,$gender,$gname,$ocp,$income,$category,$ph,
                  $nation,$mobno,$email,$country,$state,$city,$padd,$cadd,$board1,$board2,$roll1,$roll2,
				   $pyear1,$pyear2,$sub1,$sub2,$marks1,$marks2,$fmarks1,$fmarks2,$id){
  // echo $id;exit;
    $db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "update registration set course=?,subject=?,fname=?,mname=?,lname=?,gender=?,gname=?,ocp=?
              , income=?,category=?,pchal=?,nationality=?,mobno=?,emailid=?,country=?,state=?,dist=?
         	 ,padd=?,cadd=?,board=?,roll=?,pyear=?,sub=?,marks=?,fmarks=?,board1=?,roll1=?,yop1=?,sub1=?
              ,marks1=?,fmarks1=? where id=?" ;
    //echo $query;
	$stmt= $mysqli->prepare($query);
	if(false===$stmt){
			
			     	trigger_error("Error in query: " . mysqli_connect_error(),E_USER_ERROR);
			    }

	$rc=$stmt->bind_param('sssssssssssssssssssssssssssssssi',$cshort,$cfull,$fname,$mname,$lname,$gender,$gname,$ocp,$income,$category,$ph,
                  $nation,$mobno,$email,$country,$state,$city,$padd,$cadd,$board1,$board2,$roll1,$roll2,
				   $pyear1,$pyear2,$sub1,$sub2,$marks1,$marks2,$fmarks1,$fmarks2,$id);
				   
    //echo $rc;
 if ( false===$rc ) {
 
            die('bind_param() failed: ' . htmlspecialchars($stmt->error));
  }		   
	$rc=$stmt->execute();
	
	if ( false==$rc ) {
          die('execute() failed: ' . htmlspecialchars($stmt->error));
    }
	else{
         echo '<script>'; 
         echo 'alert(" Successfully Updated")'; 
          echo '</script>';
		}  
  
}
//delete Blog
function del_blog($id){

   //  echo $id;exit;
    $db = Database::getInstance();
    $mysqli = $db->getConnection();
    $query="delete from blog where bid=?";
    $stmt= $mysqli->prepare($query);
    $stmt->bind_param('s',$id);
	$stmt->execute();
    echo "<script>alert('Blog deleted successfully!')</script>";
    echo "<script>window.location.href='view-blogs.php'</script>";
}

function del_course($id){

   //  echo $id;exit;
    $db = Database::getInstance();
    $mysqli = $db->getConnection();
    $query="delete from tbl_course where cid=?";
    $stmt= $mysqli->prepare($query);
    $stmt->bind_param('s',$id);
	$stmt->execute();
    echo "<script>alert('Blog deleted successfully!')</script>";
    echo "<script>window.location.href='view-blogs.php'</script>";
}

function del_feedback($id){

   //  echo $id;exit;
    $db = Database::getInstance();
    $mysqli = $db->getConnection();
    $query="delete from feedback where id=?";
    $stmt= $mysqli->prepare($query);
    $stmt->bind_param('s',$id);
	$stmt->execute();
    echo "<script>alert('Feedback deleted successfully!')</script>";
    echo "<script>window.location.href='view-feedback.php'</script>";
}
//delete suggestion
function del_suggestion($id){

   //  echo $id;exit;
    $db = Database::getInstance();
    $mysqli = $db->getConnection();
    $query="delete from suggestions where sid=?";
    $stmt= $mysqli->prepare($query);
    $stmt->bind_param('s',$id);
	$stmt->execute();
    echo "<script>alert('Suggestion deleted successfully!')</script>";
    echo "<script>window.location.href='view-suggestions.php'</script>";
}
//delete blog category
function del_blogcat($id){

   //  echo $id;exit;
    $db = Database::getInstance();
    $mysqli = $db->getConnection();
    $query="delete from blogcat where catid=?";
    $stmt= $mysqli->prepare($query);
    $stmt->bind_param('s',$id);
	$stmt->execute();
    echo "<script>alert('Blog Category deleted successfully!')</script>";
    echo "<script>window.location.href='view-blogcat.php'</script>";
}
//delete mail
function del_mail($id){

   //  echo $id;exit;
    $db = Database::getInstance();
    $mysqli = $db->getConnection();
    $query="delete from mail where mid=?";
    $stmt= $mysqli->prepare($query);
    $stmt->bind_param('s',$id);
	$stmt->execute();
    echo "<script>alert('Requester Email-Id deleted successfully!')</script>";
    echo "<script>window.location.href='view-emails.php'</script>";
}

}

?>




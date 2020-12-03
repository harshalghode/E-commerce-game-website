<?php 
	
	require 'config.php';
	session_start();
	$uid=$_SESSION['user'];


	if(isset($_POST['pass'])){
		$pass = $_POST['pass'];
		$npass = $_POST['npass'];
		$cpass = $_POST['cpass'];
		

	if($cpass!="" AND $pass!=""){

		$stmt = $conn-> prepare("SELECT * FROM user WHERE uid=?");
          $stmt->bind_param("i",$uid);
          $stmt->execute();
          $result = $stmt->get_result();
          $row = $result->fetch_assoc();

          $pass1 = $row['password'];


          if($pass1==$pass){


          	if($npass==$cpass){
		$stmt = $conn->prepare("UPDATE user SET password=? WHERE uid=?");
		$stmt->bind_param("si",$cpass,$uid);
		$data=$stmt->execute();

		if ($data) {
			echo '<div class="alert alert-success alert-dismissible mt-2">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Password Updated Successfully </strong>
					</div>';
			$mailid=$row['email'];
			$name=$row['fname']." ".$row['lname'];
			$msg="Dear ".$name." Your Password is updated";
			mail($mailid, "Password Updated", $msg);

		}
		else{
			echo '<div class="alert alert-danger alert-dismissible mt-2">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Password Not Updated Successfully </strong>
					</div>';
		}
	}
	else{
				echo '<div class="alert alert-danger alert-dismissible mt-2">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>New Password And Confirm Password Should be Same </strong>
					</div>';
	}


          }
          else{
          	echo '<div class="alert alert-danger alert-dismissible mt-2">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Current Password is Invalid </strong>
					</div>';

          }
	 

	}

}
		

	

 ?>
 
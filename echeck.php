<?php 
	
	require 'config.php';
	session_start();
	$uid=$_SESSION['user'];


	if(isset($_POST['nmail'])){
		
		$nmail = $_POST['nmail'];
		$cmail = $_POST['cmail'];
		

	if($nmail!="" AND $cmail!=""){

		$stmt = $conn-> prepare("SELECT * FROM user WHERE uid=?");
          $stmt->bind_param("i",$uid);
          $stmt->execute();
          $result = $stmt->get_result();
          $row = $result->fetch_assoc();

         

         


          	if($nmail==$cmail){
		$stmt = $conn->prepare("UPDATE user SET email=? WHERE uid=?");
		$stmt->bind_param("si",$cmail,$uid);
		$data=$stmt->execute();

		if ($data) {
			echo '<div class="alert alert-success alert-dismissible mt-2">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Email Updated Successfully </strong>
					</div>';
			$mailid=$row['email'];
			$name=$row['fname']." ".$row['lname'];
			$msg="Dear ".$name." Your Email is updated to ".$mailid;
			mail($mailid, "New Email Updated", $msg);

		}
		else{
			echo '<div class="alert alert-danger alert-dismissible mt-2">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Email Not Updated Successfully </strong>
					</div>';
		}
	}
	else{
				echo '<div class="alert alert-danger alert-dismissible mt-2">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>New Mail And Confirm Mail Should be Same </strong>
					</div>';
	}


          
          
	 

	}

}
		

	

 ?>
 
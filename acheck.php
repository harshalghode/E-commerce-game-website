<?php 
	
	require 'config.php';
	session_start();
	$uid=$_SESSION['user'];


	if(isset($_POST['address'])){
		
		$address = $_POST['address'];
	
		

	if($address!=""){

		$stmt = $conn-> prepare("SELECT * FROM user WHERE uid=?");
          $stmt->bind_param("i",$uid);
          $stmt->execute();
          $result = $stmt->get_result();
          $row = $result->fetch_assoc();

  

       	
		$stmt1 = $conn->prepare("UPDATE user SET address=? WHERE uid=?");
		$stmt1->bind_param("si",$address,$uid);
		$data1=$stmt1->execute();

		if ($data1) {
			echo '<div class="alert alert-success alert-dismissible mt-2">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Address Updated Successfully </strong>
					</div>';
			$add=$row['address'];
			$mailid=$row['email'];
			$name=$row['fname']." ".$row['lname'];
			$msg="Dear ".$name." Your Address is updated to ".$add;
			mail($mailid, "New Address Updated", $msg);

		}
		else{
			echo '<div class="alert alert-danger alert-dismissible mt-2">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Address Not Updated Successfully </strong>
					</div>';
		}
	


          
          
	 

	}

}
		

	

 ?>
 
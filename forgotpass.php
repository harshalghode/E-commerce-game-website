<?php 
	
	require 'config.php';
	


	if(isset($_POST['email'])){
		
		$email = $_POST['email'];
		
		

	if($email!=""){




		$stmt = $conn-> prepare("SELECT * FROM user WHERE email=?");
          $stmt->bind_param("s",$email);
          $stmt->execute();
          $result = $stmt->get_result();
          $row = $result->fetch_assoc();

          if($email==$row['email']){

          	$token=  md5(date("Y/m/d"));

          	$stmt1 = $conn->prepare("UPDATE user SET token=? WHERE email=?");
			$stmt1->bind_param("ss",$token,$email);
			$data1=$stmt1->execute();

			if ($data1) {
			echo '<div class="alert alert-success alert-dismissible mt-2">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Email Activation Link Send On Your Mail </strong>
					</div>';
			$mailid=$row['email'];
			//$name=$row['fname']." ".$row['lname'];
			//$msg="Dear ".$name." Your Email is updated to ".$mailid;
			

          	$message="
          	Hello ".$row['fname']." ".$row['lname']." 
          	Here is the link to reset your password click on link to reset your password 
          	http://127.0.0.1/game/resetpassword.php?token=".$token." ";
          	mail($mailid, "Password Recovery Link", $message);
          	
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
					<strong>Email is not Registered with us </strong>
					</div>';
          }
         
        	
      	
      		


         


          	
		
	


          
          
	 

	}

}
		

	

 ?>
 

		

			

		
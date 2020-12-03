<?php 
	
	require 'config.php';
	


	if(isset($_POST['token'])){
		
		$token = $_POST['token'];
		$npass = $_POST['npass'];
		$cpass = $_POST['cpass'];
		
		

	if($npass!="" AND $cpass!=""){

		if($npass==$cpass){
		$stmt = $conn-> prepare("SELECT * FROM user WHERE token=?");
         $stmt->bind_param("s",$token);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if($row['token']==$token){

        	
        	$stmt1 = $conn->prepare("UPDATE user SET password=? WHERE token=?");
			$stmt1->bind_param("ss",$cpass,$token);
			$data1=$stmt1->execute();

			if ($data1) {
			echo '<div class="alert alert-success alert-dismissible mt-2">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Password Reset Successful !!</strong>
					</div>';

					$mailid=$row['email'];
			 	$message="
          			Hello ".$row['fname']." ".$row['lname']." 
          			Your Password Reset is Successfull";
          			mail($mailid, "Password Reset Successfull", $message); ?>
          			<script>
					alert("Password Reset Successfull");
					window.location.href = "login.php";
					</script>

			<?php
			}
			else{
				echo '<div class="alert alert-danger alert-dismissible mt-2">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Password Reset Not Successfully </strong>
					</div>';
			}		

        }
        else{
        	echo '<div class="alert alert-danger alert-dismissible mt-2">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Password Reset link is Invalid please request again for forgot password</strong>
					</div>';
			
        }
        

	}
	else{
		echo '<div class="alert alert-danger alert-dismissible mt-2">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>New Password And Confirm Password are not same </strong>
					</div>';
	}
}

}
		

	

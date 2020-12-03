<?php 
	
	require 'config.php';
	


	if(isset($_POST['token'])){
		
		$token = $_POST['token'];
		
		if($token!=""){
			$stmt = $conn-> prepare("SELECT * FROM user WHERE token=?");
        	 $stmt->bind_param("s",$token);
       		 $stmt->execute();
     		   $result = $stmt->get_result();
  		      $row = $result->fetch_assoc();

  		       if($row['token']==$token){

  		       		$status="Yes";
  		       		$stmt1 = $conn->prepare("UPDATE user SET status=? WHERE token=?");
					$stmt1->bind_param("ss",$status,$token);
					$data1=$stmt1->execute();

				if ($data1) {
					echo '<div class="alert alert-success alert-dismissible mt-2">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Account Verification Successful !!</strong>
					</div>';
					$mailid=$row['email'];
  		      $message="
          			Hello ".$row['fname']." ".$row['lname']." 
          			Your Account Verification is Successfull";
          			mail($mailid, "Account Verification Successfull", $message); ?>
          			<script>
					alert("Account Verification Successfull");
					window.location.href = "login.php";
					</script>

			<?php
			}
			


		}
		

		

	

}
		
}
	
?>

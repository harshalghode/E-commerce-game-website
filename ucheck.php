<?php 
	require 'config.php';


	if(isset($_POST['fname'])){
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$uname = $_POST['uname'];
		$email = $_POST['email'];
		$pass = $_POST['password'];
		$password = md5($pass);
		
		
		$stmt = $conn->prepare("SELECT email FROM user WHERE email=?");
		$stmt->bind_param("s",$email);
		$stmt->execute();
		$res = $stmt->get_result();
		$r = $res->fetch_assoc();
		$code = $r['email'];

		$stmt1 = $conn->prepare("SELECT uname FROM user WHERE uname=?");
		$stmt1->bind_param("s",$uname);
		$stmt1->execute();
		$res1 = $stmt1->get_result();
		$r1 = $res1->fetch_assoc();
		$code1 = $r1['uname'];

		if(!$code1){

			if(!$code){
			
			$q="INSERT INTO USER VALUES('','$fname','$lname','$uname','$email','$password','','','')";
			$data=mysqli_query($conn,$q);

				if($data){
					echo '<div class="alert alert-success alert-dismissible mt-2">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>Registration Sucessfull !!!</strong>
						</div>';
						?>
						<script>
						alert("Registration Successfull");
						//window.location.href = "login.php";
						</script>
						<?php
						$token=  md5(date("Y/m/d"));
						$stmt1 = $conn->prepare("UPDATE user SET token=? WHERE email=?");
						$stmt1->bind_param("ss",$token,$email);
						$stmt1->execute();

						$stmt11 = $conn->prepare("SELECT * FROM user WHERE email=?");
						$stmt11->bind_param("s",$email);
						$stmt11->execute();
						$res11 = $stmt11->get_result();
						$r11 = $res11->fetch_assoc();
						$code11 = $r11['email'];

			if($code11){
					//$mailid=$email;
			  $message="
         	  Hello ".$r11['fname']." ".$r11['lname']." 
       		  Here is the link to verify your account click on the link to verify your account 
          	  http://127.0.0.1/game/verifyaccount.php?token=".$r11['token']." ";
          		
          		if (mail($code11, "Account Verification Link", $message)) {
          			echo '<div class="alert alert-success alert-dismissible mt-2">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>Account Activation Link Send on your Mail ID <br> Click on the link to active your account !!!</strong>
						</div>';
						?>
						<script>
						alert("Activation Link Send on Mail Click on it to verify");
						window.location.href = "login.php";
						</script>
						<?php
          		}
          		
			}

						
			
						

			}
			
			
			}

			else{

			echo '<div class="alert alert-danger alert-dismissible mt-2">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Email already Registered </strong>
					</div>';	
			}


		}
		
		else{

			echo '<div class="alert alert-danger alert-dismissible mt-2">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Username already Registered </strong>
					</div>';	
		}
	}

	

 ?>
 
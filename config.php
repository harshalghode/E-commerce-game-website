<?php 
 $conn = new mysqli("localhost","root","","game");
 if($conn->connect_error){
 	die("Connection Failed !".$conn->connect_error);
 	
 }
  ?>
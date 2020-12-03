<?php 
	session_start();
	$uid=$_SESSION['user'];
	require 'config.php';

	if(isset($_POST['pid'])){
		$pid = $_POST['pid'];
		$pname = $_POST['pname'];
		$pprice = $_POST['pprice'];
		$pimage = $_POST['pimage'];
		
		$pqty = 1;

		$stmt = $conn->prepare("SELECT pid FROM cart WHERE pid=? AND uid=?");
		$stmt->bind_param("ii",$pid,$uid);
		$stmt->execute();
		$res = $stmt->get_result();
		$r = $res->fetch_assoc();
		$code = $r['pid'];

		if(!$code){
			$query = $conn->prepare("INSERT INTO cart (uid,pid,product_name,product_price,product_image,qty,total_price) VALUES (?,?,?,?,?,?,?)");

			$query->bind_param("iisssis",$uid,$pid,$pname,$pprice,$pimage,$pqty,$pprice);
			

			$query->execute();

			echo '<div class="alert alert-success alert-dismissible mt-2">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Item added to your cart! </strong>
					</div>';
		}
		else{

			echo '<div class="alert alert-danger alert-dismissible mt-2">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Item  already added to your cart! </strong>
					</div>';	
		}
	}

	if(isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item'){
		$stmt = $conn->prepare("SELECT * FROM cart WHERE uid=?");
		$stmt->bind_param("i",$uid);
		$stmt->execute();
		$stmt->store_result();
		$rows = $stmt->num_rows;

		echo $rows;
	}

	if(isset($_GET['remove'])){
		$id = $_GET['remove'];

		$stmt = $conn->prepare("DELETE FROM cart WHERE id=? AND uid=?");
		$stmt->bind_param("ii",$id,$uid);
		$stmt->execute();

		$_SESSION['showAlert'] = 'block';
		$_SESSION['message'] = 'Item removed from the cart! ';
		header('location:cart.php');
	}

	if(isset($_GET['clear'])){
		$stmt = $conn->prepare("DELETE FROM cart WHERE uid=?");
		$stmt->bind_param("i",$uid);
		$stmt->execute();
		$_SESSION['showAlert'] = 'block';
		$_SESSION['message'] = 'All Items removed from the cart! ';
		header('location:cart.php');
	}

	if(isset($_POST['qty'])){
		$qty = $_POST['qty'];
		$pid = $_POST['pid'];
		$pprice = $_POST['pprice'];

		$tprice = $qty*$pprice;

		$stmt = $conn->prepare("UPDATE cart SET qty=?, total_price=? WHERE id=? AND uid=?");
		$stmt->bind_param("isii",$qty,$tprice,$pid,$uid);
		$stmt->execute();

	}

	if(isset($_POST['action']) && isset($_POST['action']) == 'order'){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['number'];
		$products = $_POST['products'];
		$grand_total = $_POST['grand_total'];
		$address = $_POST['address'];
		$pmode = $_POST['pmode'];

		$data = '';

		$stmt = $conn->prepare("INSERT INTO orders (name,email,phone,address,pmode,products,amount_paid)VALUES(?,?,?,?,?,?,?)");
		$stmt->bind_param("sssssss",$name,$email,$phone,$address,$pmode,$products,$grand_total);
		$stmt->execute();
		$data .='<div class="text-center"> 
				 <h1 class="display-4 mt-2 text-danger">Thank You!</h1>
				 <h2 class="text-success">Your Order Placed Successfully!</h2>
				 <h4 class="bg-danger text-light rounded p-2">Items Purchased : '.$products.'</h4>
				 <h4>Your Name : '.$name.'</h4>
				 <h4>Your E-mail : '.$email.'</h4>
				 <h4>Your Phone : '.$phone.'</h4>
				 <h4>Total Amount Paid : <i class="fas fa-rupee-sign"></i> '.number_format($grand_total,2).'</h4>
				 <h4>Payment Mode : '.$pmode.'</h4>
				</div>';
		
		echo $data;
		$stmt1 = $conn->prepare("DELETE FROM CART");
		$stmt1->execute();
	}
 ?>	  
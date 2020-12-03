<?php 
session_start();
$user=$_SESSION['user'];
require 'config.php';
 ?>
<!DOCTYPE html>
<html>
<head>
  <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"> 
    <link rel="stylesheet"  href="css/style.css">
    <link rel="stylesheet"  href="fontawesome-free-5.13.1-web/css/all.css">
  <title>Products- ADMIN Panel</title>
  <link rel="shortcut icon" type="image/png" href="imgs/new_logo_black.png">
</head>
<body class="bg-secondary">

  <header>
   
      <nav class="navbar navbar-dark bg-dark navbar-expand-md">
        <a class="nav-brand text-white" href="admin-panel.php" >
              GAMES
            </a>

        <button data-toggle="collapse" data-target="#navbarToggler" type="button" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarToggler">

        <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a href="add-product.php" class="nav-link">Add Product</a>
              </li> 

              <li class="nav-item">
                <a href="products.php" class="nav-link">Products</a>
              </li>   

              <li class="nav-item active">
                <a href="users.php" class="nav-link">Users</a>
              </li>          

              <li class="nav-item ">
                <a href="admin-logout.php" class="nav-link">Logout</a>
              </li>          
            </ul>


          </div>
      </nav>
   
  </header>

  <div class="container ">
<div class="row justify-content-center">
  <div class="col-lg-10">
    <div style="display:<?php if(isset($_SESSION['showAlert'])){echo $_SESSION['showAlert'];}else{ echo 'none'; } unset($_SESSION['showAlert']); ?> " class="alert alert-danger alert-dismissible mt-3">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>
        <?php if(isset($_SESSION['message'])){echo $_SESSION['message'];} unset($_SESSION['message']); ?>
      </strong>
    </div>
    <div class="table-responsive mt-2">
      <table class="table table-bordered table-striped text-center">
        <thead>
        <tr>
          <td colspan="5">
            <h4 class="text-center text-white m-0">! ! ! Products ! ! !</h4>
          </td>
        </tr>
        <tr>
          <th class="text-white">User ID</th>
          <th class="text-white">First Name</th>
          <th class="text-white">Last Name</th>
          <th class="text-white">Email</th>
          <th class="text-white">Address</th>      
        </tr>
      </thead>
      <tbody>
        <?php 
          
          $stmt = $conn-> prepare("SELECT * FROM user");
          $stmt->execute();
          $result = $stmt->get_result();
          $grand_total = 0;
          while($row = $result->fetch_assoc()):
         ?>
         <tr>
           <td class="text-white"><?= $row['uid'] ?></td>
           <input type="hidden" class="uid" value="<?= $row['uid'] ?>">
           <td class="text-white"><?= $row['fname']; ?></td>
           <td class="text-white"><?= $row['lname']; ?></td>
           <td class="text-white"><?= $row['email']; ?></td>
            <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">         
           <td class="text-white"><?= $row['address']; ?></td>
            
         </tr>
         
       <?php endwhile; ?>
       
      </tbody>
      </table>
    </div>
  </div>
</div>
</div>


   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="bootstrap/js/jquery-3.5.1.slim.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<style type="text/css">
  *{
  margin: 0%;
  
}
</style>
</body>
</html>
<?php 
require 'config.php';
session_start();
$uid=$_SESSION['user'];

if(isset($_POST['submit'])){
    $search = $_POST['search'];
    if ($search) {
      $_SESSION['search']=$search;
       header("location:search.php");
    }

  }
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
  <title>Dashboard </title>
  <link rel="shortcut icon" type="image/png" href="imgs/new_logo_black.png">
</head>
<body class="bg-secondary">

 <header>
   
      <nav class="navbar navbar-dark bg-dark navbar-expand-md">
        <a class="nav-brand text-white" href="dashboard.php" >
              GAMES
            </a>

         <button data-toggle="collapse" data-target="#navbarToggler" type="button" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarToggler">

          <form class="form-inline form-submit" method="post">
      <input class="form-control ml-md-5 mr-sm-2 search" name="search" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success login" name="submit" type="submit"><i class="fas fa-search"></i></button>
    </form>

        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Games
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="action.php">Action</a>
          <a class="dropdown-item" href="adventure.php">Adventure</a>
          <a class="dropdown-item" href="modtoolkit.php">Mod Toolkit</a>
          <a class="dropdown-item" href="puzzle.php">Puzzle</a>
          <a class="dropdown-item" href="racing.php">Racing</a>
          <a class="dropdown-item" href="rgp.php">RGP</a>
          <a class="dropdown-item" href="shooter.php">Shooter</a>
          <a class="dropdown-item" href="strategy.php">Strategy</a>
          <a class="dropdown-item" href="survival.php">Survival</a>
        </div>
      </li>
                     

              <li class="nav-item">
                <a href="profile.php" class="nav-link">Profile</a>
              </li>

              <li class="nav-item">
        <a class="nav-link " href="cart.php"> <i class="fas fa-shopping-cart"></i> Cart
          <span id="cart-item" class="badge badge-danger"></span></a>
      </li>

              <li class="nav-item ">
                <a href="logout.php" class="nav-link">Logout</a>
              </li>          
            </ul>


          </div>
      </nav>
  
  </header>


<div class="container">
<div class="row justify-content-center">
  <div class="col-lg-10">
    <div style="display:<?php if(isset($_SESSION['showAlert'])){echo $_SESSION['showAlert'];}else{ echo 'none'; } unset($_SESSION['showAlert']); ?> " class="alert alert-success alert-dismissible mt-3">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>
         <?php if(isset($_SESSION['message'])){echo $_SESSION['message'];} unset($_SESSION['message']); ?>
      </strong>
    </div>
    <div class="table-responsive mt-2">
      <table class="table table-bordered table-striped text-center">
        <thead>
        <tr>
          <td colspan="7">
            <h4 class="text-center text-info m-0"> Products in your Cart !</h4>
          </td>
        </tr>
        <tr>
          <th>ID</th>
          <th>Image</th>
          <th>Product Name</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Total Price</th>
          <th>
            <a href="action1.php?clear=all" class="badge-danger badge p-1" onclick="return confirm('Are You Sure You Want To Clear All Your Cart ?');"> <i class="fas fa-trash"></i>&nbsp;&nbsp;Clear Cart</a>
          </th>
        </tr>
      </thead>
      <tbody>
        <?php 
          
          $stmt = $conn-> prepare("SELECT * FROM cart WHERE uid=?");
          $stmt->bind_param("i",$uid);
          $stmt->execute();
          $result = $stmt->get_result();
          $grand_total = 0;
          while($row = $result->fetch_assoc()):
         ?>
         <tr>
           <td><?= $row['id'] ?></td>
           <input type="hidden" class="pid" value="<?= $row['id'] ?>">
           <td><img src="<?= $row['product_image'] ?>" width=50> </td>
           <td><?= $row['product_name'] ?></td>
           <td>
            <i class="fas fa-rupee-sign"></i> <?= number_format($row['product_price'],2); ?></td>
            <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
           <td><input type="number" class="form-control itemQty" value="<?= $row['qty'] ?>" style="width:75px;"></td>
           <td>
            <i class="fas fa-rupee-sign"></i> <?= number_format($row['total_price'],2); ?></td>
            <td>
              <a href="action1.php?remove=<?= $row['id'] ?>" class="text-danger lead" onclick="return confirm(' Are You Sure You Want To Remove This Item? ');"><i class="fas fa-trash-alt"></i></a>
            </td>
         </tr>
         <?php $grand_total +=$row['total_price']; ?>
       <?php endwhile; ?>
       <tr>
         <td colspan="3">
           <a href="dashboard.php" class="btn btn-success"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Continue Shopping</a>
         </td>
         <td colspan="2"><b>Grand Total </b></td>
         <td><b><i class="fas fa-rupee-sign"></i> <?= number_format($grand_total,2); ?></b></td>
        <td><a href="checkout.php" class="btn btn-info <?= ($grand_total>1)?"":"disabled"; ?>"><i class="far fa-credit-card"></i>&nbsp;&nbsp;Checkout</a></td>
       </tr>
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
  


     <script type="text/javascript">
      $(document).ready(function(){
        
        $(".itemQty").on('change', function(){
          var $el = $(this).closest('tr');

          var pid = $el.find(".pid").val();
          var pprice = $el.find(".pprice").val();
          var qty = $el.find(".itemQty").val();
          location.reload(true);
          
          $.ajax({
            url: 'action1.php',
            method: 'post',
            cache: false,
            data: {qty:qty,pid:pid,pprice:pprice},
            success: function(response){
              console.log(response);
            }
          });
        });

        load_cart_item_number();

        function load_cart_item_number(){
          $.ajax({
            url: 'action1.php',
            method: 'get',
            data: {cartItem:"cart_item"},
            success:function(response){
              $("#cart-item").html(response);
            }
          });
        }
      });
    </script>
</style>
</body>
</html>
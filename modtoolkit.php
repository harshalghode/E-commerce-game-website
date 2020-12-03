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
          <a class="dropdown-item active" href="modtoolkit.php">Mod Toolkit</a>
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
        <a class="nav-link" href="cart.php"> <i class="fas fa-shopping-cart"></i> Cart
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
  <div id="message"></div>
  <div class="row mt-2 pb-3">
    <?php 
    include'config.php';
    session_start();
    if(isset($_POST['submit'])){
    $search = $_POST['search'];
    if ($search) {
      $_SESSION['search']=$search;
       header("location:search.php");
    }

  }
    $uid=$_SESSION['user'];
    $type="modtoolkit";
    $stmt = $conn->prepare("SELECT *  FROM product WHERE product_type=?");
    $stmt->bind_param("s",$type);
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc()):
     ?>
     <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
       <div class="card-deck">
        <div class="card p-2 border-secondary mb-2 bg-dark">
          <img src="<?= $row['product_image'] ?>" class="card-img-top" height="250">
          <div class="card-body p-1">
            <h4 class="card-title text-center text-info">
              <?= $row['product_name'] ?>
            </h4>
            <h5 class="card-text text-center text-danger"> <i class="fas fa-rupee-sign"></i>
             <?= number_format($row['product_price'],2) ?>/-
             </h5>
          </div>
          <div class="card-footer p-1">
            <form action="" class="form-submit">
              <input type="hidden" class="pid" value="<?= $row['pid'] ?>">
              <input type="hidden" class="pname" value="<?= $row['product_name'] ?>">
              <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
              <input type="hidden" class="pimage" value="<?= $row['product_image'] ?>">
              
              <button class="btn btn-info btn-block addItemBtn"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add to cart</button>
            </form>
            
          </div>
        </div>         
       </div>
     </div>
   <?php endwhile; ?>
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
        $(".addItemBtn").click(function(e){
          e.preventDefault();

          var $form = $(this).closest(".form-submit");
          var pid = $form.find(".pid").val();
          var pname = $form.find(".pname").val();
          var pprice = $form.find(".pprice").val();
          var pimage = $form.find(".pimage").val();
          
          
          $.ajax({
            url: 'action1.php',
            method: 'post',
            data: {pid:pid,pname:pname,pprice:pprice,pimage:pimage},
            success: function(response){
              $("#message").html(response);
              window.scrollTo(0,0);
              load_cart_item_number();
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
<style type="text/css">
  *{
  margin: 0%;
  
}
</style>
</body>
</html>
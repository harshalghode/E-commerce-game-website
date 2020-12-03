<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"> 
    <link rel="stylesheet"  href="css/style.css">
    <link rel="stylesheet"  href="fontawesome-free-5.13.1-web/css/all.css">
    <title>GAMES</title>
    <link rel="shortcut icon" type="image/png" href="imgs/new_logo_black.png">
  </head>
  <body class="bg-secondary">

    <header>  
        
          <nav class="navbar navbar-dark bg-dark navbar-expand-md">
            <a class="nav-brand text-white" href="#" >
              GAMES
            </a>
            

            <button data-toggle="collapse" data-target="#navbarToggler" type="button" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarToggler">
            <ul class="navbar-nav ml-md-3 mr-auto">

                <form class="form-inline form-submit" method="post">
      <input class="form-control ml-md-5 mr-sm-2 search" name="search" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success login" name="submit" type="submit"><i class="fas fa-search"></i></button>
    </form>

            </ul>
            <ul class="navbar-nav ">

              <li class="nav-item">
                <a href="login.php" class="nav-link">SIGN IN</a>
              </li>          
              <li class="nav-item ">
                <a href="#" class="nav-link">GET EPIC GAMES</a>
              </li>          
            </ul>


            </div>
          </nav>
       
      
    </header>

<div class="container">
  <div class="row">
    <div class="col">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="image/11.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="image/11.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="image/11.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    </div>
  </div>

</div>
<div class="container">
  <div id="message"></div>
  <div class="row">
    <div class="col mt-5 text-white">
      <span><strong>New Release</strong></span>
    </div>
  </div>
  <div class="row mt-2 pb-3">
    <?php 
    include'config.php';
    session_start();

    

    
   
    $stmt = $conn->prepare("SELECT *  FROM product LIMIT 4");
   
    $stmt->execute();
    $result = $stmt->get_result();

    while($row = $result->fetch_assoc()):
     ?>

     <div class="col-sm-6 col-md-4 col-lg-3 mb-2 ">

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
              
              <a href="login.php"><button class="btn btn-info btn-block addItemBtn"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add to cart</button></a> 
            </form>
            
          </div>
        </div>         
       </div>
     </div>
   <?php endwhile; ?>
  </div>
</div>


<div class="container">
  <div id="message"></div>
  <div class="row">
    <div class="col mt-5 text-white">
      <span><strong>New Release</strong></span>
    </div>
  </div>
  <div class="row mt-2 pb-3">
    <?php 
    

    

    
   
    $stmt = $conn->prepare("SELECT *  FROM product LIMIT 4");
   
    $stmt->execute();
    $result = $stmt->get_result();

    while($row = $result->fetch_assoc()):
     ?>

     <div class="col-sm-6 col-md-4 col-lg-3 mb-2 ">

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

<div class="container">
  <div id="message"></div>
  <div class="row">
    <div class="col mt-5 text-white">
      <span><strong>New Release</strong></span>
    </div>
  </div>
  <div class="row mt-2 pb-3">
    <?php 
    

    

    
   
    $stmt = $conn->prepare("SELECT *  FROM product LIMIT 4");
   
    $stmt->execute();
    $result = $stmt->get_result();

    while($row = $result->fetch_assoc()):
     ?>

     <div class="col-sm-6 col-md-4 col-lg-3 mb-2 ">

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

<div class="container">
  <div id="message"></div>
  <div class="row">
    <div class="col mt-5 text-white">
      <span><strong>New Release</strong></span>
    </div>
  </div>
  <div class="row mt-2 pb-3">
    <?php 
    

    

    
   
    $stmt = $conn->prepare("SELECT *  FROM product LIMIT 4");
   
    $stmt->execute();
    $result = $stmt->get_result();

    while($row = $result->fetch_assoc()):
     ?>

     <div class="col-sm-6 col-md-4 col-lg-3 mb-2 ">

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

  
  </body>
</html>
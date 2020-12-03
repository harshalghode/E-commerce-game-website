<?php 
  session_start();
$user=$_SESSION['user'];
if($user==true)
{

}
else
{
  header("location:index.php");
}
  require 'config.php';
   $eid=$_GET['edit'];
  $stmt = $conn-> prepare("SELECT * FROM product WHERE pid=?");
  $stmt->bind_param('i',$eid);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();
  
  $msg="";
  if(isset($_POST['submit'])){
    $p_name=$_POST['pName'];
    $p_price=$_POST['pPrice'];
    //$p_code=$_POST['pCode'];
    $p_type=$_POST['pType'];

    $target_dir="image/".$p_type."/";
    $target_file=$target_dir.basename($_FILES['pImage']["name"]);
    move_uploaded_file($_FILES['pImage']["tmp_name"],$target_file);
    
    


 
      $stmt1 = $conn->prepare("UPDATE product SET product_name=?, product_price=?, product_type=?, product_image=?   WHERE pid=?");
    $stmt1->bind_param("ssssi",$p_name,$p_price,$p_type,$target_file,$eid);
    $dat=$stmt1->execute();
      if($dat){
        $msg="Product Sucessfully Updated";

       }
       else{
        $msg="Error !";     
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
  <title>ADMIN Panel</title>
  <link rel="shortcut icon" type="image/png" href="imgs/new_logo_black.png">
</head>
<body class="bg-secondary">

  <header>
    <div class="container-fluid m-auto">
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

              <li class="nav-item">
                <a href="users.php" class="nav-link">Users</a>
              </li>  

              <li class="nav-item ">
                <a href="admin-logout.php" class="nav-link">Logout</a>
              </li>          
            </ul>


          </div>
      </nav>
    </div>
  </header>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6 bg-dark mt-2 rounded">
    <h2 class="text-center text-white p-1">Add Product Information</h2>
      <form action="" method="post" class="p-2" enctype="multipart/form-data" id="form-box">
        <div class="form-group">
          <input type="text" name="pName" class="form-control" placeholder="Product Name" value="<?= $row['product_name']; ?>" required>           
        </div>    
        <div class="form-group">
          <input type="text" name="pPrice" class="form-control" placeholder="Product Price" value="<?= $row['product_price']; ?>" required>           
        </div>
        
        <div class="form-group">

            <select name="pType" class="form-control">
              <option value="<?= $row['product_type']; ?>" selected>
              <?= $row['product_type']; ?>
              </option>
              <option value="action">Action</option>
              <option value="adventure">Adventure</option>
              <option value="modtoolkit">Mod Toolkit</option>
              <option value="puzzle">Puzzle</option>
              <option value="racing">Racing</option>
              <option value="rgp">RGP</option>
              <option value="shooter">Shooter</option>
              <option value="strategy">Strategy</option>
              <option value="survival">Survival</option>
            </select>
          </div>  
        
        <div class="form-group">
          <div class="custom-file">
            <input type="file" name="pImage" class="custom-file-input" id="customFile" >
            <label for="customFile" class="custom-file-label">Choose Product Image</label>
          </div>
        </div>
        <div class="form-group">
          <input type="submit" name="submit" class="btn btn-danger btn-block" value="Update">
        </div>  
        <div class="form-group">
          <h4 class="text-center text-white"><?= $msg; ?></h4>
        </div>  
      </form>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-6 mt-1  p-2 bg-dark rounded">
      <a href="products.php" class="btn btn-primary btn-block btn-lg">Go to products page
      </a>
    </div>
  </div>
</div>


<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="bootstrap/js/jquery-3.5.1.slim.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
</body>
</html>
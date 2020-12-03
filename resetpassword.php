<?php

require 'config.php';
$token = $_GET['token'];

?>
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
  <body class="bg-dark">

    <div class="container">
      <div class="row mt-5 justify-content-center">
         <div class="col-md-6">
          <div class="text-center p-2">
            <h1 class="text-white">GAMES</h1>
          </div>
          <div id="message"></div>
            <form action="" method="post" class="form-submit"> 
            <span class="text-white ml-1">Reset Your Password</span>
            <div class="form-group mt-2">
            <input type="password" name="npass" class="form-control bg-dark npass" placeholder="Enter New Password" required>
            </div>
            <input type="hidden" name="pass" class="form-control bg-dark token" value="<?= $token; ?>" >
            <div class="form-group">
            <input type="password" name="pass" class="form-control bg-dark cpass" placeholder="Confirm  Password" id="pass" required>
            </div>  

            


            
            

            <div class="form-group">
            <input type="submit" name="login"  value="Reset Password" class="btn btn-primary btn-block login" id="login">
            </div>

        </form>
      </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-4">
      <span class="text-muted">Don't have an Game Account?</span> <a href="register.php" class="text-white"> Sign Up</a>
    </div>
  </div>
    </div>






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="bootstrap/js/jquery-3.5.1.slim.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script src="script/jquery.min.js"></script>
    <script src="script/popper.min.js"></script>
    <script src="script/bootstrap.min.js"></script>

    <script>
      
      $(document).ready(function(){

        $(".login").click(function(e){
          e.preventDefault();

          var $form = $(this).closest(".form-submit");
          var token = $form.find(".token").val();
          var npass = $form.find(".npass").val();
          var cpass = $form.find(".cpass").val();

          //console.log(token,npass, cpass);

          $.ajax({
            url:"rpass.php",
            method:"post",
            data:{npass:npass,cpass:cpass,token:token},
            success:function(response){
              $("#message").html(response);
              window.scrollTo(0,0);
            }
          })
        })
      })

    </script>
  </body>
</html>
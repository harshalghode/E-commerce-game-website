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
            <h5 class="text-white">Forgot Password</h5>
        </div>
          <div id="message"></div>
            <form action="" method="post" class="form-submit"> 
            <span class="text-white ml-1">Email address</span>
            <div class="form-group mt-2">
                <small id="emailHelp" class="form-text text-white mb-2">Password Reset Link will be send to your Registered Email-Id</small>
            <input type="email" name="user" class="form-control bg-dark text-white email" placeholder="Enter Registered Email" required>
            </div>

            <div class="form-group">
            <input type="submit" name="login"  value="Submit" class="btn btn-primary btn-block login" id="login">
            </div>

        </form>
      </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-4">

      <span class="text-muted">Don't have an Game Account?</span> <a href="register.php" class="text-white"> Sign Up</a> <br>
      <span class="text-muted">Already have an Game Account?</span> <a href="login.php" class="text-white"> Sign In</a>
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
          var email = $form.find(".email").val();
          

          //console.log(email);

          $.ajax({
            url:"forgotpass.php",
            method:"post",
            data:{email:email},
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
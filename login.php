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
            <span class="text-white ml-1">SIGN IN WITH GAMES ACCOUNT</span>
            <div class="form-group mt-2">
            <input type="text" name="user" class="form-control bg-dark user" placeholder="Enter Username" required>
            </div>

            <div class="form-group">
            <input type="password" name="pass" class="form-control bg-dark pass" placeholder="Enter Password" id="pass" required>
            </div>  

            <div class="row">
              <div class="col-md-6">
                <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label  text-muted" for="exampleCheck1">Remember me</label>
            </div>
              </div>
              <div class="col-md-6 text-white text-right">
                <a href="forgot.php" class="text-muted">Forgot Your Password</a>
               </div>
              </div>


            
            

            <div class="form-group">
            <input type="submit" name="login"  value="Login" class="btn btn-primary btn-block login" id="login">
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
          var user = $form.find(".user").val();
          var pass = $form.find(".pass").val();

         // console.log(user,pass);

          $.ajax({
            url:"ucheck1.php",
            method:"post",
            data:{user:user,pass:pass},
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
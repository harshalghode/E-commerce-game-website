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
            <span class="text-white ml-1">Admin Login</span>
            <div class="form-group mt-2">
            <input type="text" name="user" class="form-control bg-dark user" placeholder="Enter Username" required>
            </div>

            <div class="form-group">
            <input type="password" name="pass" class="form-control bg-dark pass" placeholder="Enter Password" id="pass" required>
            </div>  

            


            
            

            <div class="form-group">
            <input type="submit" name="login"  value="Login" class="btn btn-primary btn-block login" id="login">
            </div>

        </form>
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
      

        $(".login").click(function(e){
          e.preventDefault();

          var $form = $(this).closest(".form-submit");
          var user = $form.find(".user").val();
          var pass = $form.find(".pass").val();
          

          //console.log(user,pass,name,email,mobile,aadhar,address);
          $.ajax({
            url:"check1.php",
            method:"post",
            data:{user:user,pass:pass},
            success:function(response){
              $("#message").html(response);
              window.scrollTo(0,0);
            }
          });
          
        });

       });

    </script>


  </body>
</html>
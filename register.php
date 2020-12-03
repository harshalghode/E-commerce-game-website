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
      <div class="row mt-1 justify-content-center">
         <div class="col-md-5">
          <div class="text-center p-2">
            <h1 class="text-white">GAMES</h1>
          </div>
          <div id="message"></div>
            <form action="" method="post" class="form-submit"> 
            <span class="text-white ml-1">SIGN UP</span>
            
              <div class="row  mt-2">
                <div class="col-md-6">
                 <div class="form-group"> 
                <input type="text" name="fname" class="form-control bg-dark fname" id="fname" placeholder="*Firstname" required>
                </div>
                </div>

                <div class="col-md-6">
                 <div class="form-group"> 
                <input type="text" name="lname" class="form-control bg-dark lname" id="lname" placeholder="*Lastname" required>
                </div>
                </div>
              </div>
            
            <div class="row">
              <div class="col-md-12">
                <div class="form-group"> 
                <input type="text" name="uname" class="form-control bg-dark uname" id="uname" placeholder="*Username" required>
                </div>
              </div>
              
              </div>

              <div class="row">
              <div class="col-md-12">
                <div class="form-group"> 
                <input type="text" name="email" class="form-control bg-dark email" id="email" placeholder="*Email Address" required>
                </div>
              </div>
              
              </div>

              <div class="row">
              <div class="col-md-12">
                <div class="form-group"> 
                <input type="password" name="password" class="form-control bg-dark password" placeholder="*Password" id="password" required>
                </div>
              </div>
              
              </div>

              

              <div class="row">
              <div class="col-md-12">
                <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label  text-muted" for="exampleCheck1">I would like to recive news, surveys and special offers from Games.</label>
            </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label  text-muted" for="exampleCheck1">I have read and agree to terms of service.</label>
            </div>
              </div>
            </div>

            

            


            
            

            <div class="form-group">
            <input type="submit" name="register"  value="Register" class="btn btn-primary btn-block register" id="register">
            </div>

        </form>
      </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-4 ml-5">
      <span class="text-muted">Have an Game Account?</span> <a href="login.php" class="text-white"> Sign In</a>
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
      /*  
        $("#user").blur(function(){
          document.getElementById('available').innerHTML='<h6>hello</h6>';
        });
  */      

        $(".register").click(function(e){
          e.preventDefault();

          var $form = $(this).closest(".form-submit");
          var fname = $form.find(".fname").val();
          var lname = $form.find(".lname").val();
          var uname = $form.find(".uname").val();
          var email = $form.find(".email").val();
          var password = $form.find(".password").val();
          

          //console.log(fname,lname,uname,email,password);
          $.ajax({
            url:"ucheck.php",
            method:"post",
            data:{fname:fname,lname:lname,uname:uname,email:email,password:password},
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
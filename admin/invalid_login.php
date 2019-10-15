<?php
  require('dbconnect.php');
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login : Kadella.com</title>

    <!-- linking Bootstrap libs css and js -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/sweetalert.min.js"></script>
    <script type="text/javascript" src="js/validation.js"></script>
    <style media="screen">
      body{

        background-attachment: fixed;
        background-image:url(images/admin_back.jpg);
        background-size: cover;
        }
      h4,h5,label{
        color: #963333;
      }
    </style>

  </head>
  <body>
    <div class="container" >
        <div class="row">

          <div class="col-lg-4 col-md-4 offset-lg-4 offset-md-4" style="margin-top:10%;">

            <form class="form bg-light" style="padding:30px;border-radius:15px;" action="login_2.php"  method="post">
              <h4 class="text-center">Login</h4>
              <h5 class="text-center">ACCESS DENIED</h5>
              <div class="form-group">
                <label for="">Username</label>
                <input type="text" name="user_id" id="user_id"
                class="form-control" value="">
              </div><!-- end of form group-->

              <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="access_code" id="access_code"
                class="form-control" value="">
              </div><!-- end of form group-->

              <div class="form-group col-12" style="left:18%;font-size:14px;">
                <label>Not a User <a href="add_customer_1.php">Signup</a> Here </label>

              </div>

              <div class="form-group">

                <input type="submit" class="btn btn-success btn-large btn-block" name="submit" value="Login">
                <input type="reset" class="btn btn-warning btn-large btn-block" name="reset" value="Cancel">
              </div><!-- end of form group-->
            </form><!-- end of form-->

          </div>

        </div><!-- end of row -->

    </div><!-- end of container-->


  </body>
  <script type="text/javascript">
    $(window).on('load',function(){
      swal({
            title: "Incorrect Information!!",
            text: "Userame or Password Incorrect!",
            icon:  "error",
            button: "Try Again",
           });
    });
    // to run the modal
</script>
</html>

<?php
  session_start();
  require('dbconnect.php');
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add Customer||</title>

    <!-- linking Bootstrap libs css and js -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="css/all.css" rel="stylesheet"> <!--load all styles font awesome -->
    <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script defer src="/your-path-to-fontawesome/js/all.js"></script> <!--load all styles -->

    <!-- Validation -->
    <script type="text/javascript" src="js/sweetalert.min.js"></script>
    <script type="text/javascript" src="js/validation.js"></script>


  </head>
  <body>

    <div class="container">

        <?php
        if (count($_SESSION)> 0){
          if($_SESSION['user_group']=="admin" or $_SESSION['user_group']=="user"){
            include('nav_bar.inc.php');
          }
        }

        else {

        }  ?>

        <div class="row">
          <div class="col-lg-2 col-md-2">

          </div>
          <div class="col-lg-8 col-md-8">
            <!--  html form for customer to be added-->
            <form class="form form-horizontal"
            action="add_customer_2.php"
            method="post"
            onsubmit="return validate_user();">
               <div class="form-row">

                 <h3 class="col-12">
                   <?php
                   if (count($_SESSION)> 0){
                     if($_SESSION['user_group']=="admin" or $_SESSION['user_group']=="user"){
                       }
                     else {
                         ?> <br>
                         <a style="color:#5e6a71;"href="../index.php">
                         <i style="font-size:30px;"class="fas fa-home"></i></a>
                         <?php
                       }
                   }
                   else
                   {
                       ?> <br>
                       <a style="color:#5e6a71;"href="../index.php">
                       <i style="font-size:30px;"class="fas fa-home"></i></a>
                       <?php
                     } ?>
                  Add New Customer </h3>

               </div>
               <div class="form-row">
                   <div class="form-group col-md-6">
                     <label >First Name</label>
                     <input type="text" name="f_name" class="form-control" value="" id="f_name">
                   </div>
                   <div class="form-group col-md-6">
                     <label>Last Name</label>
                     <input type="text" name="l_name" class="form-control" value="" id="l_name">
                   </div>
                 </div>

                 <label for="">Address</label>
                   <div class="form-row">

                    <div class="form-group col-md-8">
                      <label>Line1</label>
                      <input type="text" name="line1" id="line1"
                       class="form-control" value="">
                    </div>

                    <div class="form-group col-md-4">
                      <label>City</label>
                      <input type="text" name="city" id="city"
                        class="form-control" value="">
                    </div>
                  </div>
                  <div class="form-row">

                   <div class="form-group col-md-8">
                     <label>Contact Number</label>
                     <input type="text" name="phoneno" id="phoneno" min="0"
                      class="form-control" value="" maxlength="10" size ="10">
                   </div>

                   <div class="form-group col-md-4">
                     <label>Usertype</label>
                     <select id="cat" name="user_type" class="form-control">
                     <?php if($_SESSION['user_group']=="admin"){
                       ?>
                       <option value="admin">Admin</option>
                       <option value="user">User</option>
                       <?php
                     } ?>
                      <option disabled selected value = 0> -- Select an option -- </option>
                      <option value="customer">Customer</option>
                     </select>
                   </div>
                 </div>
                <label for="">Login Info</label>
                  <div class="form-row">
                   <div class="form-group col-md-6">
                     <label>Username</label>
                     <input type="text" name="username" id="usernm"
                      class="form-control" value="">
                   </div>
                   <div class="form-group col-md-6">
                     <label>Password</label>
                     <input type="password" name="password" id="password"
                       class="form-control" value="">
                   </div>
                 </div>

                <div class="form-group btn_a">
                  <input type="submit" name="submit"
                   class="btn btn-md btn-success" value="Add Now">

                   <input type="reset" name="reset"
                    class="btn btn-md btn-warning" value="Cancel">
                </div>
            </form>
            <!--  end of form-->

          </div><!--end of div col 8-->
          <div class="col-lg-2 col-md-2">

          </div>
        </div><!--end of row -->


      <?php
        include("footer.inc.php");
       ?>

    </div><!-- end of container-->

  </body>
</html>

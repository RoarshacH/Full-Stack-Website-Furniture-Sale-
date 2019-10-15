<?php
  require("validate_user.inc.php");
  require('dbconnect.php');
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CPanel</title>
    <!-- linking Bootstrap libs css and js -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="css/style.css">

  </head>
  <body>
    <?php
      include('nav_bar.inc.php'); ?>

    <div class="container">
      <div class="row" style="height:50px;">

      </div>
      <div class="row body_all">
        <div class="funct col-lg-3 col-md-3" >
          <img style="height:70px;"src="images/addpro.png" alt="">
          <div >
            <h5>Add Product</h5>
            <p>Use this option to add new furniture products in your database.</p>
          </div>
            <a href="add_product_1.php" class="buttn">Add Product</a>
        </div><!-- end of col4 div-->

        <div class="funct col-lg-3 col-md-3">
          <img style="height:70px;"src="images/search.png" alt="">
          <div class="">
            <h5>Edit Product</h5>
            <p>Use this option to update/ delete products in your website.</p>
          </div>
          <a href="search_1.php" class="buttn">Edit Product</a>
        </div><!-- end of col4 div-->

        <div class="funct col-lg-3 col-md-3">
          <img style="height:70px;"src="images/search.png" alt="">
          <div class="">
            <h5>Add User</h5>
            <p>Use this option add Users to your website.</p>
          </div>
          <a href="add_customer_1.php" class="buttn">Add Users</a>
        </div><!-- end of col4 div-->
      <!-- <div class="row"> -->
      <div class="funct col-lg-3 col-md-3" >
            <img style="height:70px;"src="images/catadd.png" alt="">
            <div class="">
              <h5>Add Sub Catogories</h5>
              <p>Use this option to Add new Sub catogories.That will Show up in the menu</p>

            </div>
            <a href="add_catogary_1.php" class="buttn">Add Catogories</a>
          </div><!-- end of col4 div-->
        <?php if($_SESSION['user_group']=="admin") { ?>
          <div class="funct col-lg-3 col-md-3">
            <img style="height:70px;"src="images/catadd.png" alt="">
            <div class="">
              <h5>Delete Sub Catogories</h5>
              <p>Use this option to Delete Sub catogories.That will Show up in the menu</p>

            </div>
              <a href="delete_catogary_1.php" class="buttn">Delete</a>

          </div><!-- end of col4 div-->
        <?php } ?>
          <div class="funct col-lg-3 col-md-3">
            <img style="height:70px;"src="images/logout.png" alt="">
            <div class="">
              <h5>Logout</h5>
              <p>Go back to login page</p>

            </div>

              <a href="logout.php" class="buttn">Logout</a>

          </div><!-- end of col4 div-->
        <!-- <div class="row"> -->
          </div>

<div class="row" style =  "height:100px;">

</div>
    </div><!-- end of container-->

    <?php
      include("footer.inc.php");
     ?>
  </body>
</html>

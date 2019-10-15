<?php
  require('dbconnect.php');
  require("validate_user.inc.php");
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>

    <!-- linking Bootstrap libs css and js -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="css/style.css">


  </head>
  <body>
      <div class="container">

        <?php
        if((count($_SESSION)>0)){ include('nav_bar.inc.php'); }?>

        <div class="row text-center" style="margin-top:250px;border-radius:13px; margin-left:6%
        ">
          <div class="col-lg-2 col-md-2">

          </div><!--end of div col 2-->

          <div class="col-lg-8 col-md-8">

            <!-- confirm message here -->

            <?php
              $message = $_REQUEST['msg'];
              $backurl = $_REQUEST['urlbk'];
              $categary= $_REQUEST['cat'];

            if($_REQUEST['status']=='pass'){
                              //close the closing brace after the success message div
             ?>

            <div class="alert alert-success" role="alert">
              <h4 class="alert-heading">STATUS : Success</h4>
              <p><?php echo $message;?>ing  <?php echo $categary;?> record has
                been successfull.</p>
              <hr>
              <a href="<?php echo $backurl ?>.php" class="btn btn-success btn-md"><?php echo $message;?> Another Record</a>
              <a href="cpanel.php" class="btn btn-info btn-md">Back to CPanel</a>
            </div>
            <?php
                }//end of if part
                else{//check the closing brace at the end of error div
             ?>

            <div class="alert alert-danger" role="alert">
              <h4 class="alert-heading">STATUS : Failed</h4>
              <p><?php echo $message;?>ing  <?php echo $categary; ?> record failed</p>
              <hr>
              <a href="<?php echo $backurl ?>.php" class="btn btn-danger btn-md">Try Again</a>
              <a href="cpanel.php" class="btn btn-info btn-md">Back to CPanel</a>
            </div>
            <?php
                }//end of else part here
             ?>

          </div><!--end of div col 8-->
          <div class="col-lg-2 col-md-2">

          </div><!--end of div col 2-->

        </div><!--end of row -->


      <?php
        include("footer.inc.php");
       ?>


    </div><!-- end of container-->

  </body>
</html>

<?php
  require("validate_user.inc.php");
  require('dbconnect.php');
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add Catogary||</title>

    <!-- linking Bootstrap libs css and js -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <!-- Validation -->
    <script type="text/javascript" src="js/sweetalert.min.js"></script>
    <script type="text/javascript" src="js/validation.js"></script>
  </head>
  <body>

    <div class="container">
        <?php include('nav_bar.inc.php') ?>

        <div class="row">
          <div class="col-lg-2 col-md-2">
          </div>
          <!--end of div col 4-->
          <div class="col-lg-8 col-md-8">

            <!--  html form for customer to be added-->
            <form class="form form-horizontal"
            action="add_catogary_2.php"
            method="post"
            onsubmit="return validate_cat();">
               <div class="form-group row">
                 <h3>Add a New Sub Catogary</h3>
               </div>
               <div class="form-row">
                 <div class="form-group col-6">
                   <label for="">Main Catogary</label>
                   <select class="form-control" name="cat" id="cat" >
                     <option disabled selected value = 0> -- Select a Catogary -- </option>
                     <?php $sql = "select * from tbl_categories;";
                     $rs = $mysqli->query($sql);
                     if(mysqli_num_rows($rs)){
                     while($row=mysqli_fetch_assoc($rs))
                     { ?>
                     <option value="<?php echo $row['cat_id'];?>">  <?php echo $row['cat_name']; ?></option>
                   <?php } ?>
                   </select>
                 <?php } ?>
                 </div>

                 <div class="form-group col-6">
                   <label for="">New Sub Catogary</label>
                   <input type="text" name="sub_cat" class="form-control"
                   value="" id="sub_catergory" maxlength="49">
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
            <!-- validating the form with JS -->

          </div><!--end of div col 8-->
          <div class="col-lg-2 col-md-2">
          </div>
        </div><!--end of row -->

    </div><!-- end of container-->
          <?php
            include("footer.inc.php");
           ?>

  </body>
</html>

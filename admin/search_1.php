<?php
  require("validate_user.inc.php");
  require('dbconnect.php');
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
    <!-- Validation -->
    <script type="text/javascript" src="js/sweetalert.min.js"></script>
    <script type="text/javascript" src="js/validation.js"></script>

  </head>
  <body>

    <div class="container">
        <?php include('nav_bar.inc.php') ?>

        <div class="row" style="margin-top:30px;">
          <div class="col-lg-2 col-md-2">

        </div><!--end of div col 4-->
        <div class="col-lg-8 col-md-8" style="position:absolute;top:20%;left:15%;" >
          <form class="form" action="search_2.php" method="post"
            onsubmit="return validate_search();" >
            <div class="form-row">
                <div class="form-group col-md-4">
                  <label >Product Name</label>
                  <input type="text" class="form-control" id="name_product" name="keywords">
                </div>
                <div class="form-group col-md-4">
                  <label>Type</label>
                  <select id="cat_name" name="catogary" class="form-control" onchange="loadData(this.value);">
                    <option disabled selected value = "100"> -- Select an option -- </option>
                    <option value="0">All Catogories</option>
                    <option value="10">Price </option>
                    <?php
                    $sql = "select * from tbl_categories";
                    $rs = $mysqli->query($sql);
                    while($row=mysqli_fetch_assoc($rs)){?>
                      <option value="<?php echo $row['cat_id']; ?>">
                        <?php echo $row['cat_name']; ?>
                      </option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group col-4 float-right">
                  <label for="">&nbsp;</label>
                  <input type="submit" class="form-control btn btn-success"
                  name="" value="SEARCH">
                </div>
              </div>
          </form>

        </div><!--end of div col 8-->
        <div class="col-lg-2 col-md-2">

        </div><!--end of div col 4-->

        </div><!--end of row -->


      <?php
        include("footer.inc.php");
       ?>


    </div><!-- end of container-->


  </body>
</html>

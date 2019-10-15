<?php
  require('dbconnect.php');
  require("validate_user.inc.php");
  require("validate_admin_user.inc.php");
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>

    <!-- linking Bootstrap libs css and js -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>

  </head>
  <body>

    <div class="container">
        <?php include('nav_bar.inc.php') ?>

        <div class="row">
          <div class="col-lg-2 col-md-2">

          </div>

          <div class="col-lg-8 col-md-8">

            <?php
              $id = $_REQUEST['id'];
              //build the sql command using the CID
              $sql = "select * from tbl_products,tbl_subcat,tbl_categories where proID=$id and ";
              $sql .= "tbl_products.proSubType = tbl_subcat.sub_id and tbl_products.proType = tbl_categories.cat_id group by proID";
              //execute the sql command

              $rs = $mysqli->query($sql);

              if(mysqli_num_rows($rs)){
                //read a record in the $rs object
                //$row = mysqli_fetch_array($rs);
                $row = mysqli_fetch_assoc($rs);
                //echo "<pre>";
                //print_r($row);
                //die();
             ?>
             <!--  html form for customer to be deleted-->
               <form class="form form-horizontal"
               action="delete_product_3.php"
               method="post"
               onsubmit="return validate();"
               enctype="multipart/form-data">

               <div class="form-group row">
                 <h3>Delete Product</h3>
               </div>
               <input type="hidden" name="pid" value="<?php echo $row['proID'];?>">
               <div class="form-row">
                   <div class="form-group col-md-6">
                     <label >Product Name</label>
                     <input type="text" class="form-control" id="name" name="name"
                     value="<?php echo $row['proName'];?>">
                   </div>
                   <div class="form-group col-md-6">
                     <label>Price</label>
                     <input type="text" class="form-control" id="price" name="price"
                      value="<?php echo $row['price'];?>">
                   </div>
                 </div>
                 <label for="">Dimentions</label>
                   <div class="form-row">
                     <?php $dim = explode("X",$row['dimentions']); ?>
                    <div class="form-group col-md-4">
                      <label>Length</label>
                      <input type="number" name ="length"
                      value = "<?php echo $dim[0]; ?>" class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                      <label>Width</label>
                      <input type="number" name ="width"
                      value = "<?php echo $dim[1]; ?>" class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                      <label>Height</label>
                      <input type="number" name ="height"
                      value = "<?php echo $dim[2]; ?>" class="form-control">
                    </div>
                  </div>

                 <div class="form-group">
                   <label for="">Description for the Product</label>
                   <textarea name="description" class="form-control"
                    rows="4" cols="80"><?php echo $row['decription'];?></textarea>
                 </div>

                 <div class="form-row">
                   <div class="form-group col-md-6">
                     <label for="inputState">Catogary</label>
                     <select id="cat" name="catogary" class="form-control" onchange="loadData(this.value);">
                         <option>
                           <?php echo $row['cat_name']; ?>
                         </option>
                     </select>
                   </div>
                   <div class="form-group col-md-6"  >
                     <label for="inputState">Subcatogary</label>
                     <select id="display_area" name="sub_cat"class="form-control ">
                       <option>
                         <?php echo $row['name'];?>
                       </option>
                     </select>
                   </div>
                 </div>
                 <label for="">Exiting Picture</label>
                 <div class="form-group ">
                   <img class="img_box" src="../images/products/thumbs/<?php echo $row['picture'];?>" alt="">
                 </div>

                 <div class="form-group btn_a">
                   <input type="submit" name="submit"
                    class="btn btn-md btn-success" value="Delete">

                    <a href="search_1.php"> <input type="reset" name="reset"
                     class="btn btn-md btn-warning" value="Cancel"> </a>
                 </div>
               </form>

            <?php }
            else {
              echo "No Records";
            } ?>
             <!--  end of form-->

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

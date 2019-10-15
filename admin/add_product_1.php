<?php
  require("validate_user.inc.php");
  require('dbconnect.php');
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add PProduct||</title>

    <!-- linking Bootstrap libs css and js -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <!-- validation -->
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
            action="add_product_2.php"
            method="post"
            onsubmit="return validate_product();"
            enctype="multipart/form-data">

            <div class="form-group row">
              <h3>Add New Product</h3>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                  <label >Product Name</label>
                  <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group col-md-6">
                  <label>Price (Rs.)</label>
                  <input type="number" class="form-control" id="price" name="price">
                </div>
              </div>
              <label for="">Dimentions</label>
                <div class="form-row">

                 <div class="form-group col-md-4">
                   <label>Length</label>
                   <input type="number" id="length" name ="length" class="form-control">
                 </div>
                 <div class="form-group col-md-4">
                   <label>Width</label>
                   <input type="number"  id = "width"name ="width" class="form-control">
                 </div>
                 <div class="form-group col-md-4">
                   <label>Height</label>
                   <input type="number" id = "height"name ="height" class="form-control">
                 </div>
               </div>

              <div class="form-group">
                <label for="">Description for the Product</label>
                <textarea name="description" id= "desc"class="form-control"
                 rows="4" cols="80"></textarea>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputState">Catogary</label>
                  <select id="cat_pro" name="catogary" class="form-control" onchange="loadData(this.value);">
                    <option disabled selected value = 0> -- Select a Catogary -- </option>
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
                <div class="form-group col-md-6"  >
                  <label for="inputState">Subcatogary</label>
                  <select id="display_area" name="sub_cat"class="form-control ">

                  </select>
                </div>
              </div>

              <div class="form-group ">
                <label for="">Picture Of the Product</label>
                <input type="file" name="picture" id="pic_file"
                 class="form-control" required
                 accept="image/jpeg"
                 >
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

    <!-- Ajax Function -->
    <script type="text/javascript">
      var xmlhttp;

      function loadData(id){
        xmlhttp = GetXmlHttpObject();

        if (xmlhttp==null) {
            alert ("Your browser does not support AJAX!");
            return;
        }
          var url="ajax_load_cat.php";
          url=url+"?id="+id;
          //url=url+"&sid="+Math.random();//it works perfect without this line
          xmlhttp.onreadystatechange=stateChanged;
          xmlhttp.open("post",url,true);
          xmlhttp.send(null);
          //timer();
      }

      function stateChanged(){
      if (xmlhttp.readyState==4){
          document.getElementById("display_area").innerHTML=xmlhttp.responseText;
        }
      }


      function GetXmlHttpObject(){
        if(window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            return new XMLHttpRequest();
        }

        if (window.ActiveXObject){
            // code for IE6, IE5
            return new ActiveXObject("Microsoft.XMLHTTP");
         }

         return null;
      }

    </script>

  </body>
</html>

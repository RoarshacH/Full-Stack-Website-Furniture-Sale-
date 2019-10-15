<?php
  require("validate_user.inc.php");
  require("validate_admin_user.inc.php");
  require('dbconnect.php');
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Delete Catogary||</title>

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
            action="delete_catogary_2.php"
            method="post"
            onsubmit="return validate_cat();">
               <div class="form-group row">
                 <h3>Add a New Sub Catogary</h3>
               </div>
               <div class="form-row">
                 <div class="form-group col-md-6">
                   <label for="inputState">Catogary</label>
                   <select id="cat" name="catogary" class="form-control" onchange="loadData(this.value);">
                     <option disabled selected value = 0> -- Select an option -- </option>
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
                   <select id="display_area" name="sub_cat"class="form-control">

                   </select>
                 </div>
               </div>

                <div class="form-group btn_a">

                  <input type="submit" name="submit"
                   class="btn btn-md btn-danger" value="Delete">

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

<!-- modal -->


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

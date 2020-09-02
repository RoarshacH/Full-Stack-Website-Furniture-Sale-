<!DOCTYPE html>
<?php include('admin/dbconnect.php') ?>
<!-- DB Connection -->
<html lang="en">
  <head>
    <title><?php echo $row['proName'];?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">

    <style media="screen">
      .text-div{
        margin-top: -15px;
        margin-bottom: 10px;
      }
      .text-div p{
        margin-top: -20px;

      }
    </style>
  </head>
  <body class="goto-here">
    <?php
    include("navbar.inc.php");
    // Include Navbar
    $sql = "select * from tbl_products,tbl_subcat, tbl_categories where proID = " . $_REQUEST['pid']. " group by proID;";
    // Get Produt Detals SQL Query
    $rs = $mysqli->query($sql);
    if($rs){
    $row=mysqli_fetch_assoc($rs);?>

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span class="mr-2">
              <a href="shop.php?cat_id=<?php echo $row['proType'];?>&sid=<?php echo $row['proSubType'];?>&catnm=<?php echo $row['cat_name'];?>">Shop</a></span>
            </p>
            <h1 class="mb-0 bread"><?php echo $row['proName'];?></h1>
          </div>
        </div>
      </div>
    </div>
    <!-- end of banner section -->

    <section class="ftco-section">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-6 mb-5 ftco-animate">
    				<a href="images/products/large/<?php echo $row['picture'];?>" class="image-popup">
              <img src="images/products/thumbs/<?php echo $row['picture'];?>"
              style="border-radius:10px;"
              class="img-fluid" alt="Image Of Product">
              <!-- Product Image -->
            </a>
    			</div>

        	<div class="col-lg-6 product-details pl-md-5 ftco-animate">
    				<h3 style="margin-bottom:0px;"> <?php echo $row['proName'];?></h3>
    				<p class="price"><span><?php echo "Rs. ". $row['price']. " /=";?></span>
            </p>
            <table class="text-div">
                <tr>
                  <td>Category </td>
                  <td><?php echo $row['cat_name'];?></td>
                </tr>
                <tr>
                  <td>Sub Category  </td>
                  <td><?php echo $row['name'];?></td>
                </tr>
                <tr>
                  <td>Dimentions </td>
                  <td><?php echo $row['dimentions'];?></td>
                </tr>
              </table>
            <p style="height:180px;padding: 5px;border-radius: 10px;border:1px solid #ccc;
            font:16px/26px Georgia, Garamond, Serif;overflow:auto;">
              <?php echo $row['decription'];?>
						</p>
    		</div>

      </div>
      </div>
    </section>
  <?php }
  else {?>
    <!-- If ther is a Error Executing query SHow this Message -->
    <div class="row">
        <div class="col-md-12">
            <div class="error-template">
                <h1>
                    Oops!!</h1>
                <h2>
                    Sorry No Records of the product Found</h2>
                <div class="error-details">
                    This is a technical error sorry for the inconvinience!
                </div>
            </div>
        </div>
    </div>
  <?php }
  include("footer.inc.php");
  ?>
  <!-- include Footer -->
<!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

  </body>
</html>

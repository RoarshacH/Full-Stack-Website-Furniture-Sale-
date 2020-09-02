<!DOCTYPE html>
<?php
require('admin/dbconnect.php');
  // Pagination Function

  $cat = $_REQUEST['cat_id'];
  $subcat = $_REQUEST['sid'];
  if (isset($_GET['pageno']))
  {
      $pageno = $_GET['pageno'];
  }
  else {
      $pageno = 1;
  }
  $no_of_records_per_page = 6;
  $offset = ($pageno-1) * $no_of_records_per_page;
  $cat = $_REQUEST['cat_id'];
  $subcat = $_REQUEST['sid'];
// Getting the Count of records
  $sql = "select count(*) from tbl_products,tbl_subcat, tbl_categories where ";
  if ($subcat == 0) {
    $sql .= "proType =$cat";
  }
  else{
    $sql .= "proType =$cat and proSubType = $subcat";

  }
  $sql .= " and tbl_products.proType = tbl_categories.cat_id and tbl_products.proSubType = tbl_subcat.sub_id group by proID";

  $result  = $mysqli->query($sql);
  $total_rows = mysqli_num_rows($result);
  $total_pages = ceil($total_rows / $no_of_records_per_page);


   ?>
<html lang="en">
  <head>
    <title>Products||</title>
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
  </head>
  <body class="goto-here">
		<?php  include("navbar.inc.php"); ?>
    <!-- Navbar -->

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Products</span></p>
            <h1 class="mb-0 bread"><?php echo $_REQUEST['catnm']; ?></h1>
          </div>
        </div>
      </div>
    </div>
    <!-- Banner of the Search -->

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-10 mb-5 text-center">
            <ul class="product-category">
              <li><a <?php echo ($_REQUEST['sid']== 0)?'selected':''; ?>
                class="dropdown-item" href="shop.php?cat_id=<?php echo $row['cat_id'];?>&sid=0">
                All
              </a>
            <?php
            $sqlsub = "select * from tbl_subcat where cat_id = ". $_REQUEST['cat_id'];
            // Show sub categoris and hiliht the selected sub category
            $rs1 = $mysqli->query($sqlsub);
            if(mysqli_num_rows($rs1)){ ?>
            <?php while($row2=mysqli_fetch_assoc($rs1))
              {?>
                <li>
                <a class="<?php echo ($_REQUEST['sid']==$row2['sub_id'])?'active':''; ?>"
                class="dropdown-item" href="shop.php?cat_id=<?php echo $row['cat_id'];?>&sid=<?php echo $row2['sub_id'];?>">
                  <?php echo $row2['name'];?>
                </a>
              </li>
            <?php } }?>
              </ul>
            </div>
    		</div>

        <!-- Start of Search Function -->
        <?php
        if (!empty($_REQUEST)) {

          $cat      = $_REQUEST['cat_id'];
          $subcat   = $_REQUEST['sid'];
          $name_cat = $_REQUEST['catnm'];

          $sql = "select * from tbl_products,tbl_subcat, tbl_categories where ";
          if ($subcat == 0) {
            $sql .= "proType =$cat";
          }
          else{
            $sql .= "proType =$cat and proSubType = $subcat";
          }
          $sql .= " and tbl_products.proType = tbl_categories.cat_id and tbl_products.proSubType = tbl_subcat.sub_id group by proID limit  $offset, $no_of_records_per_page";
          // echo $sql;
          // die();
          $rs = $mysqli->query($sql);
         // Show the Records if there ara any
          if(mysqli_num_rows($rs))
          {
            ?>
          <!-- Pagination Function -->
          <div class="row mt-5" style="margin-bottom:40px;margin-top:0px">
            <div class="col text-center">
              <div class="block-27">
                <ul>
                     <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                         <a href="<?php if($pageno <= 1){ echo '#'; } else
                         { echo "?cat_id=$cat&sid=$subcat&catnm=$name_cat&pageno=".($pageno - 1); } ?>">&lt;</a>
                     </li>
                     <li><a> <?php  echo $pageno; ?></a></li>
                     <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                         <a href="<?php if($pageno >= $total_pages){ echo '#'; } else
                          { echo "?cat_id=$cat&sid=$subcat&catnm=$name_cat&pageno=".
                           ($pageno + 1); } ?>">&gt;</a>
                     </li>

                </ul>
              </div>
            </div>
          </div>

      <!-- End of pagination function -->

    		<div class="row">
          <?php
          while($row=mysqli_fetch_assoc($rs))
          {
            // While loop will crate a card for every page
            ?>
    			<div class="col-md-6 col-lg-4 ftco-animate">
    				<div class="product">
              <div class="prod-div-img">
                <a class="img-prod"><img class="img-fluid" style="max-height:300px;width:100%"
                  src="images/products/thumbs/<?php echo $row['picture'];?>"
                  alt="Colorlib Template">
      						<!-- <span class="status">30%</span> -->
      						<div class="overlay"></div>
      					</a>
              </div>
              <!-- Image -->
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="#"><?php echo $row['proName'];?></a></h3>
                <!-- <h3 id="display_area">TEXT HERE</h3> -->
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span class="mr-2 price-sale"><?php echo "Rs. ". $row['price']. " /=";?></span></p>
                    <h6><a href="#"><?php echo $row['dimentions'];?></a></h6>
		    					</div>
	    					</div>

	    					<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    							<a href="product-single.php?pid=<?php echo $row['proID'];?>"
                      class="add-to-cart d-flex justify-content-center align-items-center text-center">
	    								<span><i class="ion-ios-menu"></i></span>
                      <!-- More inof -->
	    							</a>

                    <a onclick="loadData(<?php echo $row['proID'];?>)"
                      class="btn add-to-cart d-flex justify-content-center align-items-center text-center">
	    								<span id="display_area"><i class="ion-ios-heart"></i></span>
                      <!-- add to wishlist -->
	    							</a>

    							</div>
    						</div>
                <!-- Links -->
    					</div>
    				</div>
    			</div>
          <?php
          }
        }
            // End of the Products show function
        else {
          // If there are no products matching
           ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="error-template">
                        <h1>
                            Oops!</h1>
                        <h2>
                            Sorry No Records Found</h2>
                        <div class="error-details">
                            Accoding to current parameters no records found try Searching using the all catogary!
                        </div>
                    </div>
                </div>
            </div>
           <?php  }
         } ?>
  		</div>
        <!-- End of Products row -->

    	</div>
      <!-- end of div container -->
    </section>

    <?php
    include("footer.inc.php");
     ?>
     <!-- Incude Footer -->
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
<!-- Ajax Function -->
  <script type="text/javascript">
    var xmlhttp;

    function loadData(id){
      xmlhttp = GetXmlHttpObject();

      if (xmlhttp==null) {
          alert ("Your browser does not support AJAX!");
          return;
      }
        var url="ajax_load_wish.php";
        url=url+"?id="+id+"&cid=<?php echo $_SESSION['c_id']; ?>&dlt=false";
        //url=url+"&sid="+Math.random();//it works perfect without this line
        xmlhttp.onreadystatechange=stateChanged;
        xmlhttp.open("post",url,true);
        xmlhttp.send(null);
        swal("Product Added!", "The Product is Added to your Wishlist!", "success");
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
    // End of ajax Function for Wishlist

  </script>
  <script src="admin/js/sweetalert.min.js"></script>
  <script src="admin/js/validation.js"></script>

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
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
  <!-- Ajax Function -->

  </body>
</html>

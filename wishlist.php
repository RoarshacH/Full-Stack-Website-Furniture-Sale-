<!DOCTYPE html>
<?php
require('admin/dbconnect.php');
// DB Connection
?>
<html lang="en">
  <head>
    <title>Wishlist <?php echo $_SESSION['user_id'] ?></title>
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
	<?php include("navbar.inc.php"); ?>
  <!-- Include Navbar -->

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Wishlist</span></p>
            <h1 class="mb-0 bread"><?php echo $_SESSION['user_id'] ?></h1>
          </div>
        </div>
      </div>
    </div>
    <!-- Banner -->

    <section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
              <?php
                $user = $_SESSION['c_id'];

                $sql = "select * from tbl_products,tbl_wishlist where user_id = $user ";
                $sql .= " and tbl_products.proID = tbl_wishlist.product_ID group by proID ";
                // echo $sql;
                // die();
                $rs = $mysqli->query($sql);

                if(mysqli_num_rows($rs))
                {
                  // Fetch Records
                  ?>
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>Product List</th>
						        <th>&nbsp;</th>
						        <th>Price</th>
						        <th>Dimentions</th>

						      </tr>
						    </thead>
						    <tbody>
                <?php while($row=mysqli_fetch_assoc($rs)){ ?>
						      <tr class="text-center">
						        <td id = "display_area" class="product-remove"><a onclick="loadData(<?php echo $row['proID'];?>)">
                      <span class="btn ion-ios-trash"></span></a></td>

						        <td class="image-prod"><a href="images/products/large/<?php echo $row['picture'];?>" class="image-popup">
                      <div class="img"
                      style="background-image:url(images/products/thumbs/<?php echo $row['picture'];?>);"></div></a></td>

						        <td class="product-name">
						        	<h3> <a href="product-single.php?pid=<?php echo $row['proID'];?>"><?php echo $row['proName'];?> </a> </h3>
						        	<p><?php echo substr($row['decription'],0,100);?></p>
						        </td>

						        <td class="price"><?php echo "Rs. ". $row['price']. " /=";?></td>

						        <td class="quantity">
						        	<div class="input-group mb-3">
					             	<input type="text" name="quantity"
                        class="quantity form-control input-number"
                        value="<?php echo $row['dimentions'];?>">
					          	</div>
					          </td>


						      </tr><!-- END TR-->
                <?php } ?>
                <!-- End of table PHP Gearation -->

						    </tbody>
						  </table>
            <?php }
            else {
              // ? if no items in the wishlist
              ?>
              <div class="row">
                  <div class="col-md-12">
                      <div class="error-template">
                          <h1>
                              Oops!</h1>
                          <h2>
                              Sorry You have no items in your Wish list</h2>
                          <div class="error-details">
                              You have no items in your wishlist please add items by clicking the <i class="ion-ios-heart"> </i>
                                icon in the products!!!
                          </div>
                      </div>
                  </div>
              </div>

              <?php
            } ?>
            <!-- End of else -->
					  </div>
    			</div>

    		</div>
			</div>
		</section>

    <?php
    include("footer.inc.php");
     ?>
  <!-- include the footer -->


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
        url=url+"?id="+id+"&cid=<?php echo $_SESSION['c_id']; ?>&dlt=true";
        //url=url+"&sid="+Math.random();//it works perfect without this line
        xmlhttp.onreadystatechange=stateChanged;
        xmlhttp.open("post",url,true);
        xmlhttp.send(null);
        location.reload();
        // swal("Product Removed!", "The Product Was removed from the Wishlist!", "warning");
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
  <!-- End of ajax Function -->
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
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

  <script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){

		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());

		        // If is not undefined

		            $('#quantity').val(quantity + 1);


		            // Increment

		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());

		        // If is not undefined

		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });

		});
	</script>

  </body>
</html>

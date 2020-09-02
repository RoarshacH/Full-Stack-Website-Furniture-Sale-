<!DOCTYPE html>
<?php
include('admin/dbconnect.php');
// DB Connection
?>
<html lang="en">
  <head>
    <title>NewLanka|| Home</title>
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
		<?php
    include("navbar.inc.php");
     ?>
     <!-- Include Nav Bar -->

    <section id="home-section" class="hero">
		  <div class="home-slider owl-carousel">
	      <div class="slider-item" style="background-image: url(images/banner_2.jpg);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

	            <div class="col-md-12 ftco-animate text-center">
	              <h1 style="margin-top:-20px;"class="heading mb-4">
                  <img src="images/NewlankaLogoTP.png" alt=""
                  class=" mx-auto d-block" style="height:350px;width:auto;">
                </h1>
	            </div>

	          </div>
	        </div>
	      </div>

	      <div class="slider-item" style="background-image: url(images/banner_1.jpg);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

              <div class="col-md-12 ftco-animate text-center">
                <h1 style="margin-top:-20px;"class="heading mb-4">
                  <img src="images/NewlankaLogo2.png" alt=""
                  class=" mx-auto d-block" style="height:350px;width:auto;">
                </h1>
              </div>

	          </div>
	        </div>
	      </div>
	    </div>
    </section>
    <!-- End Of Banner -->

    <section class="ftco-section">
			<div class="container">
				<div class="row no-gutters ftco-services">

          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-shipped"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Free Transprt</h3>
                <span>On Local Orders** </span>
              </div>
            </div>
          </div>

          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-box"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">New Designs</h3>
                <span>Well packaged Products</span>
              </div>
            </div>
          </div>

          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-award"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Superior Quality</h3>
                <span>Quality Products</span>
              </div>
            </div>
          </div>

          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-customer-service"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Support</h3>
                <span>Customer Support</span>
              </div>
            </div>
          </div>

        </div>
			</div>
		</section>
    <!-- end of the icons section -->

    <section class="ftco-section">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<span class="subheading">Featured Products</span>
            <h2 class="mb-4">Our Products</h2>
            <p>Top Grade Furnitures from genune row materials in Hill Countrry... Today Dicounts</p>
          </div>
        </div>
    	</div>
      <!-- Strt of the Top Products -->
    	<div class="container">
    		<div class="row">
          <?php
          $sql = "select * from tbl_products order by RAND() limit 8;";
          $rs = $mysqli->query($sql);
          if(mysqli_num_rows($rs)){
          while($row=mysqli_fetch_assoc($rs))
          { ?>
    			<div class="col-md-6 col-lg-3 ftco-animate ">
    				<div class="product pro-index">
              <?php
              $discount = rand(5,12);
              $disfrac = (100 - $discount)/100;
              $newpr =  $row['price'] * $disfrac;?>
              <div class="prod-div-img">
                <a class="img-prod img-home"><img class="img-fluid" src="images/products/thumbs/<?php echo $row['picture'];?>"
                  alt="Colorlib Template">
      						<span class="status"><?php echo $discount. "% off " ?></span>
      						<div class="overlay"></div>
      					</a>
              </div>
    					<div class="text py-3 pb-4 px-3 text-center text-index">
    						<h3><a href="product-single.php?pid=<?php echo $row['proID'];?>"><?php echo $row['proName'];?></a></h3>
    						<h6><a href="#"><?php echo $row['dimentions'];?></a></h6>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span class="mr-2 price-dc"><?php echo "Rs ".$row['price'];?></span>
                      <span class="price-sale"><?php echo "Rs ". $newpr; ?></span></p>
		    					</div>
	    					</div>
	    				</div>
    				</div>
    			</div>
        <?php }
      } ?>
    	</div>
    </section>
    <!-- end of featured products -->

<!-- Stat of the Number counters -->
  		<section class="ftco-section ftco-counter img" id="section-counter"
      style="margin-top:-70px;">
      	<div class="container">
      		<div class="row justify-content-center py-5">
      			<div class="col-md-10">
  		    		<div class="row">

  		          <div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
  		            <div class="block-18 text-center">
  		              <div class="text">
  		                <strong class="number" data-number="<?php $sql = "select * from tbl_products";
                        $row = mysqli_num_rows($mysqli->query($sql));
                        echo  $row ;?>">0</strong>
  		                <span>Products</span>
  		              </div>
  		            </div>
  		          </div>
<!-- Fetech number of records from the DB and show it -->
  		          <div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
  		            <div class="block-18 text-center">
  		              <div class="text">
  		                <strong class="number" data-number="<?php $sql = "select * from tbl_subcat";
                        $row = mysqli_num_rows($mysqli->query($sql));
                        echo  $row ;?>">0</strong>
  		                <span>Catogaries</span>
  		              </div>
  		            </div>
  		          </div>

  		          <div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
  		            <div class="block-18 text-center">
  		              <div class="text">
  		                <strong class="number" data-number="<?php $sql = "select * from tbl_users";
                        $row = mysqli_num_rows($mysqli->query($sql));
                        echo  $row ;?>">0</strong>
  		                <span>Registerd Users</span>
  		              </div>
  		            </div>
  		          </div>

  		        </div>
  	        </div>
          </div>
      	</div>
      </section>
        <!-- For counts of the database -->

<!-- Start Customer Testimonials -->
      <section class="ftco-section testimony-section">
        <div class="container">
          <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
            	<span class="subheading">Testimony</span>
              <h2 class="mb-4">What our satisfied customers are saying</h2>
            </div>
          </div>

          <div class="row ftco-animate">
            <div class="col-md-12">
              <div class="carousel-testimony owl-carousel">
                <!--Using Owl COrosal to Shoft  through the Cards  -->
                <div class="item">
                  <div class="testimony-wrap p-4 pb-5">
                    <div class="user-img mb-5" style="background-image: url(images/person_1.jpg)">
                      <span class="quote d-flex align-items-center justify-content-center">
                        <i class="icon-quote-left"></i>
                      </span>
                    </div>
                    <div class="text text-center">
                      <p class="mb-5 pl-4 line">Ordered a new dining set/hutch combination of Amish hand-made furniture.
                        The website was very user friendly and well laid out.
                        </p>
                      <p class="name">Garreth Smith</p>
                      <span class="position">Marketing Manager</span>
                    </div>
                  </div>
                </div>
                <!-- End of item -->
                <div class="item">
                  <div class="testimony-wrap p-4 pb-5">
                    <div class="user-img mb-5" style="background-image: url(images/person_2.jpg)">
                      <span class="quote d-flex align-items-center justify-content-center">
                        <i class="icon-quote-left"></i>
                      </span>
                    </div>
                    <div class="text text-center">
                      <p class="mb-5 pl-4 line">Excellent service in ordering and delivery of product. Product is as depicted in photo and is of very good quality</p>
                      <p class="name">Alex Murphy</p>
                      <span class="position">RealEstate Agent</span>
                    </div>
                  </div>
                </div>
                <!-- End of item -->
                <div class="item">
                  <div class="testimony-wrap p-4 pb-5">
                    <div class="user-img mb-5" style="background-image: url(images/person_3.jpg)">
                      <span class="quote d-flex align-items-center justify-content-center">
                        <i class="icon-quote-left"></i>
                      </span>
                    </div>
                    <div class="text text-center">
                      <p class="mb-5 pl-4 line">The delivery process and set up was explained and timely. Product info was super. Quality exceeded expectations. Thank you!</p>
                      <p class="name">Thomas Pattersan</p>
                      <span class="position">Redistributer</span>
                    </div>
                  </div>
                </div>
                  <!-- End of item -->
                <div class="item">
                  <div class="testimony-wrap p-4 pb-5">
                    <div class="user-img mb-5" style="background-image: url(images/person_1.jpg)">
                      <span class="quote d-flex align-items-center justify-content-center">
                        <i class="icon-quote-left"></i>
                      </span>
                    </div>
                    <div class="text text-center">
                      <p class="mb-5 pl-4 line">Perfect service and best furniture.purchased wardrobe second time from NewLanka.Good quality furniture.</p>
                      <p class="name">Garreth Smith</p>
                      <span class="position">Hotel Owner</span>
                    </div>
                  </div>
                </div>
                <!-- End of item -->
                <div class="item">
                  <div class="testimony-wrap p-4 pb-5">
                    <div class="user-img mb-5" style="background-image: url(images/person_1.jpg)">
                      <span class="quote d-flex align-items-center justify-content-center">
                        <i class="icon-quote-left"></i>
                      </span>
                    </div>
                    <div class="text text-center">
                      <p class="mb-5 pl-4 line">
                        I purchased my last 2 beds from here and I couldn't be happier! The products are exactly what I ordered.
                          I would order again from them. Thank you!</p>
                      <p class="name">Jonathan Cross</p>
                      <span class="position">Teacher</span>
                    </div>
                  </div>
                </div>
                <!-- End of item -->
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- End of Testimonoals Sections -->
    <hr>
		<?php
    include("footer.inc.php");
     ?>
     <!-- Incude the Footer -->
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
    <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

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
<!-- incuded Scripts -->
  </body>
</html>

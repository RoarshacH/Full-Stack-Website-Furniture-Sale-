<!DOCTYPE html>
<?php

    if(isset($_REQUEST['submit'])){
      //sending mail can be done here

      $name = $_REQUEST['name'];
      $email = $_REQUEST['email'];
      $subject = $_REQUEST['subject'];
      $message = $_REQUEST['message'];
// Getting the information
      $x = mail("example.idm@gmail.com",$subject,"By \n". $name ."\n".$message);
      if($x>0){
        $status = "pass";
      }
      else{
        $status = "fail";
      }
    }
    else{
      //sending mail cannot happen
    }

 ?>
<html lang="en">
  <head>
    <title>Contact||</title>
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
    <!-- Incuding the Navbar -->

    <div class="hero-wrap hero-bread" style="background-image: url('images/image_4.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Contact us</span></p>
            <h1 class="mb-0 bread">Contact us</h1>
          </div>
        </div>
      </div>
    </div>
    <!-- Banner -->

    <section class="ftco-section contact-section bg-light">
      <div class="container">
      	<div class="row d-flex mb-5 contact-info">
          <div class="w-100"></div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-white p-4">
	            <p><span>Address:</span> 198 West 21th Street, Mawanella</p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-white p-4">
	            <p><span>Phone:</span> </br><a href="tel://1234567920">+94 71 2355 987</a></p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-white p-4">
	            <p><span>Email:</span> <a href="mailto:info@yoursite.com">newlanka@furniture.com</a></p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-white p-4">
	            <p><span>Website</span> <a href="#">NewLankaFurniture.com</a></p>
	          </div>
          </div>
        </div>
        <!-- end of info boxes -->

      <div class="row block-9">
          <div class="col-md-6 order-md-last d-flex">
            <form action="contact.php" class="bg-white p-5 contact-form" onsubmit="return validate();">
              <div class="form-group">
                <input type="text" id="name" name="name" class="form-control" placeholder="Your Name">
              </div>
              <div class="form-group">
                <input type="text" id="email" name="email" class="form-control" placeholder="Your Email">
              </div>
              <div class="form-group">
                <input type="text" id="subject" name="subject" class="form-control" placeholder="Subject">
              </div>
              <div class="form-group">
                <textarea name="message" id="message" cols="30" rows="7"
                class="form-control" placeholder="Message"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                <input type="reset" value="Reset" class="btn btn-primary py-3 px-5">
              </div>
            </form>
<!-- end of contact form -->
          </div>

          <div class="col-md-6 d-flex">
          	<div class= "hidden-md-down" style="padding:10px;" class="bg-white">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.891453524257!2d80.44647941459486!3d7.253193294764353!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae315a091a6c505%3A0x6a80297291626321!2sLanka%20Furniture!5e0!3m2!1sen!2slk!4v1570175089145!5m2!1sen!2slk"
            width="500" height="500" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>
            <!-- Google Map -->
          </div>
        </div>
      </div>

    </section>

    <?php
    include("footer.inc.php");
     ?>
<!-- Including the Footer -->



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
  <script src="admin/js/sweetalert.min.js"></script>
  <script src="admin/js/validation.js"></script>
  <!-- Validation sweetalert-->
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

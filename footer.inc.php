<footer class="ftco-footer ftco-section">
  <div class="container">
    <div class="row">
      <div class="mouse">
        <a href="#" class="mouse-icon">
          <div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
        </a>
      </div>
    </div>
    <div class="row mb-5">
      <div class="col-md">
        <div class="ftco-footer-widget mb-4">
          <h2 class="ftco-heading-2">New Lanka Furnitures</h2>
          <p>Top Grade Furnitures from genune row materials in Hill Countrry<br> Since 1980....</p>
          <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
            <li class="ftco-animate"><a ><span class="icon-twitter"></span></a></li>
            <li class="ftco-animate"><a ><span class="icon-facebook"></span></a></li>
            <li class="ftco-animate"><a ><span class="icon-instagram"></span></a></li>
          </ul>
        </div>
        <!-- INfo -->
      </div>
      <div class="col-md">
        <div class="ftco-footer-widget mb-4 ml-md-5">
          <h2 class="ftco-heading-2">Menu</h2>
          <ul class="list-unstyled">
            <li><a href="index.php" class="py-2 d-block">Home</a></li>

            <li><a href="about.php" class="py-2 d-block">About Us</a></li>
            <li><a href="contact.php" class="py-2 d-block">Contact Us</a></li>
          </ul>
        </div>
      </div>
      <!-- Links -->
      <div class="col-md">
         <div class="ftco-footer-widget mb-4">
          <h2 class="ftco-heading-2">Help</h2>
          <div class="d-flex">
            <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
              <li><a href="admin/add_customer_1.php" class="py-2 d-block">New User</a></li>
              <?php if (count($_SESSION)>0) { ?>
                <li><a href="wishlist.php" class="py-2 d-block">Wishlist</a></li>
                <li><a href="admin/logout.php" class="py-2 d-block">Logout</a></li>
              <?php }
              else{ ?>
              <li><a href="admin/login_1.php" class="py-2 d-block">Sign IN</a></li>
            <?php } ?>

            </ul>

          </div>
        </div>
      </div>
      <!-- Utilities -->
      <div class="col-md">
        <div class="ftco-footer-widget mb-4">
          <h2 class="ftco-heading-2">Have a Questions?</h2>
          <div class="block-23 mb-3">
            <ul>
              <li><span class="icon icon-map-marker"></span><span class="text">203 St, Mawanella, Sri Lanka</span></li>
              <li><a ><span class="icon icon-phone"></span><span class="text">+94 71 3929 210</span></a></li>
              <li><a ><span class="icon icon-envelope"></span><span class="text">info@NewLKFurniture.com</span></a></li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Contact -->
    </div>
    <hr>
    <div class="row" style="margin-top:-50px;">
      <div class="col-md-12 text-center">

        <p>
          <div class="text-center">
            <img src="images/logo3.png" style="width:20%;margin-bottom:-3% ;" alt="">
            <p>Copyright Virlich Softworks &reg; <?php echo date('Y'); ?></p>
          </div>


        </p>
      </div>
    </div>
    <!-- End of logo -->
  </div>
</footer>

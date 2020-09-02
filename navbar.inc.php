<!DOCTYPE html>
<?php
session_start();
require('admin/dbconnect.php');?>
<!-- DB Connection and SESSION ARRAY -->
<html lang="en" dir="ltr">
  <body>
    <div class="py-1 bg-primary">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-2 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>

						    <span class="text">+94 71 2355 980</span>
					    </div>
              <!-- end of contact Number -->
					    <div class="col-md pr-2 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
                <?php if (count($_SESSION)>0) {
                  if ($_SESSION['user_group']=="customer"){?>
                    <span class="text"><?php echo $_SESSION['user_id']; ?></span>
                  <?php }
                  // Show username
                  else{ ?>
                    <!-- Link to back end of user is admin/ user -->
                    <a href="admin/cpanel.php">
                      <span class="text">  <?php echo $_SESSION['user_id']; ?>
                    </span> </a>
                <?php }
                  }
                  else {
                    ?><span class="text">newlanka@furniture.com</span><?php
                   } ?>
                   <!-- Show Email If Not Logged in -->

					    </div>
              <!-- End of Username. Email -->
              <div class="col-md pr-2 d-flex topper align-items-center text-lg-right">
                <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-user"></span></div>
                <a href="admin/add_customer_1.php">
                  <span class="text">New User</span></a>
              </div>

              <?php
               if (count($_SESSION)>0) {
                 ?>
                 <div class="col-md pr-2 d-flex topper align-items-center text-lg-right">
                  <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-remove"></span></div>
                  <a href="admin/logout.php"> <span class="text">Logout</span></a>
                </div>
                <!-- Show Logout if logged in -->
                 <?php
               }
               else {
                ?>
                <div class="col-md pr-2 d-flex topper align-items-center text-lg-right">
                  <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-key"></span></div>
                  <a href="admin/login_1.php">
                    <span class="text">Login</span></a>
                </div>
                <?php
               }?>
               <!-- Show login if not logged in-->

				    </div>
			    </div>
		    </div>
		  </div>
    </div>
    <!-- Start of Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">NewLanka</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>

            <!-- loop navbar -->
            <?php
            $sqlnav = "select * from tbl_categories;";
            $rsnav = $mysqli->query($sqlnav);
            if(mysqli_num_rows($rsnav)){
            while($rownav=mysqli_fetch_assoc($rsnav))
            { ?>
              <!-- Fetch Categories from the Database -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="shop.php?cat_id=<?php echo $rownav['cat_id'];?>&sid=0"
              id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo $rownav['cat_name']; ?></a>

                <?php
                $sqlsubnav = "select * from tbl_subcat where cat_id =" . $rownav['cat_id'].";";
                $rssubnav = $mysqli->query($sqlsubnav);
                if(mysqli_num_rows($rssubnav)){ ?>
                  <div class="dropdown-menu" aria-labelledby="dropdown04">
                  <?php while($rowsubnav=mysqli_fetch_assoc($rssubnav))
                    {?> <a class="dropdown-item" href="shop.php?cat_id=<?php echo $rownav['cat_id'];?>
                      &sid=<?php echo $rowsubnav['sub_id'];?>&catnm=<?php echo $rownav['cat_name'];?>
                      ">
                      <!-- Fetch Sub Categories and Show Them -->
                        <?php echo $rowsubnav['name'];?></a>

                  <?php } ?>

                  </div>
                <?php } ?>
                <!-- end of sub catogary loop -->
              </li>
            <?php
                }
              } ?>
              <!-- end of outter loop -->

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown04"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Info</a>
            <div class="dropdown-menu" aria-labelledby="dropdown04">
            	<a class="dropdown-item" href="about.php">About</a>
            	<a class="dropdown-item" href="contact.php">Contact</a>
              <?php
               if (count($_SESSION)>0) {
                 ?> <a class="dropdown-item"
                 href="wishlist.php">
                 Wishlist</a>
               <?php } ?>
               <!-- Show Wishlist if logged in -->
            </div>
          </li>

          </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END navbar -->

  </body>
</html>

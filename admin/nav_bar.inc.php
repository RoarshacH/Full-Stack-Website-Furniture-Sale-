<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color:#272727;">

    <a class="navbar-brand" href="#"><?php echo $_SESSION['user_id']; ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item  <?php echo ($page_nm =='cpanel')?'active':''; ?>">
          <a class="nav-link" href="cpanel.php">CPanel
            <span class="sr-only"></span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../index.php">Website
            <span class="sr-only"></span>
          </a>
        </li>
        <li class="nav-item <?php echo ($page_nm =='search_customer')?'active':''; ?>">
          <a class="nav-link" href="add_product_1.php">Add Product</a>
        </li>
        <li class="nav-item <?php echo ($page_nm =='search_customer')?'active':''; ?>">
          <a class="nav-link" href="add_customer_1.php">Add Customer</a>
        </li>
        <li class="nav-item <?php echo ($page_nm =='search_customer')?'active':''; ?>">
          <a class="nav-link" href="add_catogary_1.php">Add Sub Catogary</a>
        </li>
        <li class="nav-item <?php echo ($page_nm =='search_property')?'active':''; ?>">
          <a class="nav-link" href="search_1.php">Search Product</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Log Out</a>
        </li>
      </ul>
    </div>
  </nav>

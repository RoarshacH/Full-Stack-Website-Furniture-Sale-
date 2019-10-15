<?php
  require("validate_user.inc.php");
  require('dbconnect.php');
  ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <!-- linking Bootstrap libs css and js -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="css/all.css" rel="stylesheet"> <!--load all styles font awesome -->
    <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script defer src="/your-path-to-fontawesome/js/all.js"></script> <!--load all styles -->
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

    <div class="container">
        <?php include('nav_bar.inc.php') ?>

        <div class="row">
          <div class="col-lg-12 col-md-12">
              <form class="form" action="search_2.php" method="post"
                onsubmit="return validate_search();">

                <div class="form-row">
                    <div class="form-group col-md-4">
                      <label >Product Name</label>
                      <input type="text" class="form-control" id="name" name="keywords"
                      value="<?php echo $_REQUEST['keywords']; ?>" required="required">
                    </div>
                    <div class="form-group col-md-4">
                      <label>Type</label>
                      <select id="cat" name="catogary" class="form-control" >
                        <option value="0"
                        <?php echo ($_REQUEST['catogary']== 0)?'selected':''; ?>
                        >All Catogories</option>
                        <option value="10"
                        <?php echo ($_REQUEST['catogary']== 10)?'selected':''; ?>>Price</option>
                        <?php
                        $sql3 = "select * from tbl_categories";
                        $rs1 = $mysqli->query($sql3);
                        while($row2=mysqli_fetch_assoc($rs1)){?>
                          <option value="<?php echo $row2['cat_id']; ?>"
                            <?php echo ($_REQUEST['catogary']==$row2['cat_id'])?'selected':''; ?>>
                            <?php echo $row2['cat_name']; ?>
                          </option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group col-4 float-right">
                      <label for="">&nbsp;</label>
                      <input type="submit" class="form-control btn btn-success"
                      name="" value="SEARCH">
                    </div>
                  </div>
              </form>

            </div>

        </div><!--end of row -->

        <div class="row">
          <div class="col-lg-12 col-md-12">
            <?php
              $searchBy = $_REQUEST['catogary'];
              $keywords = $_REQUEST['keywords'];

              $sql = "select * from tbl_products,tbl_subcat, tbl_categories where ";
              if ($searchBy == 0) {
                $sql .= "proName ='$keywords' or proName like '%$keywords%'";
              }
              elseif ($searchBy == 10) {
                $sql .= "price <= $keywords ";
              }
              else{
                $sql .= "proName ='$keywords' or proName like '%$keywords%' and proType = $searchBy";

              }
              $sql .= " and tbl_products.proType = tbl_categories.cat_id and tbl_products.proSubType = tbl_subcat.sub_id group by proID";
              //
              // echo $sql;
              // die();

              $rs = $mysqli->query($sql);

              if(mysqli_num_rows($rs)){
                ?>
                <table class="table table-bordered table_search">
                  <tr>

                    <th>Name</th>
                    <th>Description</th>
                    <th>Dimentions</th>
                    <th>Type</th>
                    <th>Sub Type</th>
                    <th>Price</th>
                    <th>Picture</th>
                    <th>Actions</th>
                  </tr>
                  <?php
                    //there may be more than 1 record so lets use a loop
                    while($rowdt=mysqli_fetch_assoc($rs)){
                      ?>
                      <tr>
                        <td><?php echo $rowdt['proName'];?></td>
                        <td><?php echo $rowdt['decription'];?></td>
                        <td><?php echo $rowdt['dimentions'];?></td>
                        <td><?php echo $rowdt['cat_name'];?></td>
                        <td><?php echo $rowdt['name'];?></td>
                        <td><?php echo $rowdt['price'];?></td>
                        <td style="width:150px;padding:5px;"><img src="../images/products/thumbs/<?php echo $rowdt['picture'];?>"
                          alt=""
                          style="width:100%;"></td>
                        <!-- edit Things -->
                        <td>
                          <a href="edit_product_2.php?id=<?php echo $rowdt['proID'];?>">
                            <i style="color:black;margin:3px;"class="far fa-edit"></i></a>
                            <!-- only unlock if the user is admin -->
                            <?php if ($_SESSION['user_group'] == 'admin') { ?>
                              <a href="delete_product_2.php?id=<?php echo $rowdt['proID'];?>">
                                <i style="color:black;margin:3px;"class="fa fa-trash" aria-hidden="true"></i></a>
                          <?php  } ?>

                        </td>
                      </tr>
                      <?php
                    }
                   ?>
                </table>
                <?php
              }
              else{
                ?>
                <div class="alert alert-danger" role="alert">
                  <h4 class="alert-heading"> No Record Found</h4>
                  <p>Sorry No Records were found try using differnt search parameters</p>
                  <hr>
                  <a href="cpanel.php" class="btn btn-info btn-lg">Back to CPanel</a>
                </div>
                <?php
              }

             ?>
          </div>
        </div>


      <?php
        include("footer.inc.php");
       ?>


    </div><!-- end of container-->


  </body>
</html>

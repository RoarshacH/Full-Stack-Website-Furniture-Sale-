<?php
  include("admin/dbconnect.php");
// DB Connectin
  $product   = $_REQUEST['id'];
  $user      = $_REQUEST['cid'];
  $function  = $_REQUEST['dlt'];
// getting the values
  if ($function == 'true') {
    $sql = "delete from tbl_wishlist where user_id = $user and product_ID = $product ";
    $x = $mysqli->query($sql);
    if($x>0){
      ?>
      <i class="btn ion-checkmark"></i>
      <?php
// removing from the database
      }
    else {
      ?>
      <span class="btn ion-ios-close"></span><?php

    }

  }
  else{
    $sql = "insert into tbl_wishlist values($user,$product);";
    $x = $mysqli->query($sql);
    if($x>0){
      ?>
      <i class="ion-checkmark-round"></i></span><?php
// adding to the database
      }
    else {
      ?>
      <i class="ion-ios-heart"></i><?php

    }
  }





 ?>

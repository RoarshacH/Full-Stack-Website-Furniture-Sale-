<?php
  //connect to the database
  require("dbconnect.php");
  require("validate_user.inc.php");
  require("validate_admin_user.inc.php");
  require("code_bank.inc.php");

  $pid  = addslashes($_REQUEST['pid']);
  $upd = "insert into tbl_archiveProd select * from tbl_products where proID=$pid";
  $mysqli->query($upd);
  $existing_picture_name = getPictureName($pid);
  $sql  = "delete from tbl_products where proID = $pid";
  //execute the sql command
  // echo $sql;
  // die();
  $x = $mysqli->query($sql);

  if($x>0){
    if($existing_picture_name!="default.jpg"){
      //dont try this at home ! be aware
      unlink("../images/products/large/$existing_picture_name");
      unlink("../images/products/thumbs/$existing_picture_name");
      }
    //echo "update was successfull";
  header("location:querymessege.php?status=pass&msg=Delete&urlbk=search_1&cat=Product");
  }
  else{
    //echo "not successfull";
    header("location:querymessege.php?status=fail&msg=Delete&urlbk=search_1&cat=Product");
  }



 ?>

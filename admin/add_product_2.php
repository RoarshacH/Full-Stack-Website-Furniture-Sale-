<?php
  //db connection
  require("validate_user.inc.php");
  require("dbconnect.php");
  require("code_bank.inc.php");
  // print_r($_FILES);
  // die();
  // echo "<pre>";
  // print_r($_REQUEST);
  // die();
  //storing values from form fields in variable
  $name          = addslashes($_REQUEST['name']);
  $price         = addslashes($_REQUEST['price']);
  $description   = addslashes($_REQUEST['description']);
  $catogary      = addslashes($_REQUEST['catogary']);
  $sub_cat       = addslashes($_REQUEST['sub_cat']);
  $dimentions    = addslashes($_REQUEST['length']) . "X" . addslashes($_REQUEST['width']) . "X" . addslashes($_REQUEST['height']);
   // echo $dimentions;
   // die();
  //build a SQL dynamically command to insert thse data to db table

  $sql  = "insert into tbl_products (proname, price, decription, proType, proSubType, dimentions) values(";
  $sql .= "'$name',";
  $sql .= "$price,";
  $sql .= "'$description',";
  $sql .= "$catogary,";
  $sql .= "$sub_cat,";
  $sql .= "'$dimentions');";
  // 
  // echo $sql;
  // die();
  //execute the SQL command
  $x = $mysqli->query($sql);

   //display the sql with value for confirmation
  //checking whether execution of the SQL command was
  //successfull
  if($x>0){

    // echo "Record succesfully added";
    if(($_FILES['picture']['error']==0) &&($_FILES['picture']['type']=='image/jpeg')){

      $last_id     = $mysqli->insert_id;
      $filename    = $_FILES['picture']['tmp_name'];
      $destination = $last_id . "_" .rand().rand().rand().".jpg";

      $y = move_uploaded_file($filename,"../images/products/large/".$destination);
      if($y>0){
        copy("../images/products/large/".$destination,"../images/products/thumbs/".$destination);

        //resizing the uploaded picture
        resizeThumbPicture("../images/products/thumbs/",$destination);

        $sql2 = "update tbl_products set picture='$destination' where proID=$last_id";
        $mysqli->query($sql2);
        echo $sql2;

      }

    }
    // picture upload resize move
    header("location:querymessege.php?status=pass&msg=Add&urlbk=add_product_1&cat=Product");
  }
  else{
    // echo "sorry adding record failed";
    //echo $sql; //for debug purpose
    //die("adding failed");
    header("location:querymessege.php?status=fail&msg=Add&urlbk=add_product_1&cat=Product");
  }

 ?>

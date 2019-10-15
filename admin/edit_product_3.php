<?php
  //connect to the database
  require("dbconnect.php");
  require("validate_user.inc.php");
  require("code_bank.inc.php");

  // echo "<pre>";
  // print_r($_REQUEST);
  // die();
  //storing values from form fields in variable
  $id            = addslashes($_REQUEST ['pid']);
  $name          = addslashes($_REQUEST['name']);
  $price         = addslashes($_REQUEST['price']);
  $description   = addslashes($_REQUEST['description']);
  $catogary      = addslashes($_REQUEST['catogary']);
  $sub_cat       = addslashes($_REQUEST['sub_cat']);
  $dimentions    = addslashes($_REQUEST['length']) . "X" . addslashes($_REQUEST['width']) . "X" . addslashes($_REQUEST['height']);

  //building a SQL command to update the table


  $sql  = "update tbl_products set ";
  $sql .= "proName = '$name', ";
  $sql .= "price = $price, ";
  $sql .= "decription = '$description', ";
  $sql .= "proType = $catogary, ";
  $sql .= "proSubType = $sub_cat, ";
  $sql .= "dimentions = '$dimentions' ";
  $sql .= "where proID=$id ;";

  //execute the SQL command
  $x = $mysqli->query($sql);

  if($x>0){
    if(($_FILES['picture']['error']==0) &&($_FILES['picture']['type']=='image/jpeg')){
      $filename    = $_FILES['picture']['tmp_name'];
      if ($_REQUEST['ext_pic'] == "") {
        $destination = $id . "_" .rand().rand().rand().".jpg";
      }
      else{
        $destination = $_REQUEST['ext_pic'];
      }


      $y = move_uploaded_file($filename,"../images/products/large/".$destination);
      if($y>0){
        copy("../images/products/large/".$destination,"../images/products/thumbs/".$destination);

        //resizing the uploaded picture
        resizeThumbPicture("../images/products/thumbs/",$destination);

        $sql2 = "update tbl_products set picture='$destination' where proID=$id";
        $mysqli->query($sql2);
        // echo $sql2;
        // die();
         }

    }
    //echo "update was successfull";
    header("location:querymessege.php?status=pass&msg=Edit&urlbk=search_1&cat=Product");
  }
  else{
    //echo "not successfull";
    header("location:querymessege.php?status=fail&msg=Edit&urlbk=search_1&cat=Product");
  }



 ?>

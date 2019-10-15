<?php
  //db connection
  require("validate_user.inc.php");
  require("dbconnect.php");

  // echo "<pre>";
  // print_r($_REQUEST);
  // die();
  //storing values from form fields in variable
  $catogary        = addslashes($_REQUEST['cat']);
  $sub_cat         = addslashes($_REQUEST['sub_cat']);

  //build a SQL dynamically command to insert thse data to db table

  $sql  = "insert into tbl_subcat (cat_id,name) values(";
  $sql .= "$catogary,";
  $sql .= "'$sub_cat');";
  // echo $sql;
  // die();
  //execute the SQL command
  $x = $mysqli->query($sql);

  //echo $sql;
  // die(); //display the sql with value for confirmation
  //checking whether execution of the SQL command was
  //successfull
  if($x>0){
    // echo "Record succesfully added";
    header("location:querymessege.php?status=pass&msg=Add&urlbk=add_catogary_1&cat=SubCatogary");
  }
  else{
    // echo "sorry adding record failed";
    //echo $sql; //for debug purpose
    //die("adding failed");
    header("location:querymessege.php?status=fail&msg=Add&urlbk=add_catogary_1&cat=SubCatogary");
  }

 ?>

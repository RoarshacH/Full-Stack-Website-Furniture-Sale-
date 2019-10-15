<?php
  //db connection
  // require("validate_user.inc.php");
  require("dbconnect.php");

  // echo "<pre>";
  //print_r($_REQUEST);
  //storing values from form fields in variable
  $f_name        = addslashes($_REQUEST['f_name']);
  $l_name        = addslashes($_REQUEST['l_name']);
  $line1         = addslashes($_REQUEST['line1']);
  $city          = addslashes($_REQUEST['city']);
  $phoneno       = addslashes($_REQUEST['phoneno']);
  $username      = addslashes($_REQUEST['username']);
  $password      = addslashes($_REQUEST['password']);
  $usergroup     = addslashes($_REQUEST['user_type']);
  $password      = crypt($password,"P[87]**1fgq");
  //build a SQL dynamically command to insert thse data to db table

  $sql  = "insert into tbl_users (first_name,last_name,address_line1,
                                     city,phone_no,user_id,access_code,user_group) values(";
  $sql .= "'$f_name',";
  $sql .= "'$l_name',";
  $sql .= "'$line1',";
  $sql .= "'$city',";
  $sql .= "'$phoneno',";
  $sql .= "'$username',";
  $sql .= "'$password',";
  $sql .= "'$usergroup')";

  //execute the SQL command
  $x = $mysqli->query($sql);
  // echo $sql;
  // die(); //display the sql with value for confirmation
  //checking whether execution of the SQL command was
  //successfull

  if($x>0){
    if((count($_SESSION)>0)){
      if($_SESSION['user_group']=="admin" or $_SESSION['user_group']=="user"){
        header("location:querymessege.php?status=pass&msg=Add&urlbk=add_customer_1&cat=Customer");
      }
      else {
        header("location:../index.php");
      }

    }
    else {
      header("location:login_1.php");
    }
  }
  else{

    header("location:querymessege.php?status=fail&msg=Add&urlbk=add_customer_1&cat=Customer");
  }

 ?>

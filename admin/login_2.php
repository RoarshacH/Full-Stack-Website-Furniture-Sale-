<?php
  session_start();
  //connect to db server
  require("dbconnect.php");
  // echo "<pre>";
  // print_r($_REQUEST);

  $user_id      = $_REQUEST['user_id'];
  $access_code  = $_REQUEST['access_code'];

  //build a sql command to retrive the users
  $sql = "select * from tbl_users where user_id='$user_id'";

  //execute the sql and see whether any username
  //matches
  $rs = $mysqli->query($sql);

  if(mysqli_num_rows($rs)>0){
    //username found
    //echo "user name ok";
    $row = mysqli_fetch_assoc($rs);
    ;
    if(crypt($access_code,"P[87]**1fgq") == $row['access_code']){
      echo "password is matching";
      //let's redirect the user to CPanel page
      //store the valid user info in the $_SESSION array
      $_SESSION['user_id'] = $user_id;
      $_SESSION['access_code']=$user_id;
      $_SESSION['user_group'] = $row['user_group'];
      $_SESSION['c_id'] = $row['c_id'];
      if ($row['user_group'] == 'customer') {
        header("location:../index.php");

      }
      else {
        header("location:cpanel.php");
      }

    }
    else{
      //echo "password is wrong";
      //redirect the user invalid_login.php
      header("location:invalid_login.php");
    }
  }
  else{
    //invalid username
    //echo "no such username";
    //redirect the user invalid_login.php
    header("location:invalid_login.php");
  }

 ?>

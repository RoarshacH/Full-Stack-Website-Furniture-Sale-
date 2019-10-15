<?php
//validating the user
session_start();

if(!(count($_SESSION)>0)){
  header("location:invalid_login.php");
}
 ?>

<?php
  if($_SESSION['user_group']!="admin"){
    header("location:invalid_login.php");
  }
 ?>

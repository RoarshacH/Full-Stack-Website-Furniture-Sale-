<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "furniture_test"; //db name

    $mysqli = new mysqli($server,$username,$password,$dbname);

    if ($mysqli->connect_error) {

      echo $mysqli->connect_error."<br>";
      die("connection Failed");

    }





     ?>

  </body>
</html>

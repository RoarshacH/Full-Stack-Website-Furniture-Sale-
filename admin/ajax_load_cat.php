<?php
  include("dbconnect.php");

  // print($_REQUEST['id']);
  $val = $_REQUEST['id'];

  $sql = "select * from tbl_subcat where cat_id = $val ";
  $rs = $mysqli->query($sql);
  while($row=mysqli_fetch_assoc($rs)){?>
    <option value="<?php echo $row['sub_id']; ?>">
      <?php echo $row['name']; ?>
    </option>
  <?php } ?>

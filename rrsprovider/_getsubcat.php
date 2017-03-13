<?php
  include 'core/init.php';
  $id = $_POST['id'];
  $id = explode('#',$id);
  $catid = $id[0];

  $sql = "SELECT * FROM `tbl_subcategory` WHERE `category_id` = '$catid'";
  $result = mysqli_query($con,$sql);
    echo "<option>Select Category</option>";
  while ($row = mysqli_fetch_array($result)) {
    echo "<option value=".$row['id'].">".$row['subcategory_name']."</option>";
  }

 ?>

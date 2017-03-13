<?php include 'includes/header.php'; include 'includes/snav.php'; ?>
<?php
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($con,"SELECT * FROM `tbl_products` WHERE `id` = '$id'");
  }
 ?>
<div id="about"  class="container spacer">
  
</div>
<?php include 'includes/footer.php'; ?>

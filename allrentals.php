<?php include 'includes/header.php'; include 'includes/snav.php';?>
<?php
  $result = mysqli_query($con,"SELECT * FROM `tbl_category`")
 ?>
<!-- works -->
<div id="works"  class=" clearfix grid">
  <?php while($row = mysqli_fetch_object($result)): ?>
    <figure class="effect-oscar  wowload fadeIn">
        <img src="rradmin/<?= $row -> category_image?>" alt="<?= $row -> category_name ?>"/>
        <figcaption>
            <h2><?= $row -> category_name ?></h2>
            <p>Starts From as low as <br> 1000 Rs.<br>
            <a href="rent.php?cat=<?= $row -> category_name ?>">Book Now</a></p>
        </figcaption>
    </figure>
  <?php endwhile; ?>
</div>
<!-- works -->
<?php include 'includes/footer.php'; ?>

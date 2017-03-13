<?php include 'includes/header.php'; include 'includes/snav.php'; ?>
<?php
  if (isset($_GET['cat'])) {
    $id = $_GET['cat'];
    $result = mysqli_query($con,"SELECT * FROM `tbl_products` WHERE `category_name` = '$id'");
  }
 ?>
<div id="about"  class="container spacer">
  <?php while($row = mysqli_fetch_object($result)): ?>
    <div class="col-md-3">
			<div class="pricing-table-grid">
				<div class="plans_head">
					<h3 style="margin: .8em 0 1em 0"><?= $row -> name ?></h3>
          <img src="rrsprovider/<?= $row -> product_image ?>" class="img-responsive" alt="">
				</div>
				<ul>
					<li><a href="#">Hourly Price: <?= $row -> hourly_price?> Rs.</a></li>
					<li><a href="#">Daily Price: <?= $row -> daily_price?> Rs.</a></li>
					<li><a href="#">Weekly Price: <?= $row -> weekly_price?> Rs.</a></li>
					<li><a href="#">Monthyly Price: <?= $row -> monthly_price?> Rs.</a></li>
					<li style="padding:10px;"><a href="#">Pickup Location : <br><?= $row -> pickup_location ?></a></li>
			    </ul>
			    <a class="popup-with-zoom-anim button" href="single.php?id=<?= $row -> id ?>">Order Now</a>
      </div>
    </div>
  <?php endwhile; ?>
</div>
<?php include 'includes/footer.php'; ?>

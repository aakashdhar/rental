<?php include 'includes/header.php'; include 'includes/snav.php'; ?>
<?php
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $result = mysqli_query($con,"SELECT * FROM `tbl_products` WHERE `id` = '$id'");
  $row = mysqli_fetch_object($result);
}
 ?>
<div id="about"  class="container spacer">
  <div class="single-page">
		<!--//details-product-slider-->
	 <div class="details-left-slider">
		 <div class="grid images_3_of_2">
		  <ul id="etalage">
			<li>
				<img class="etalage_thumb_image" src="rrsprovider/<?= $row -> product_image1?>" class="img-responsive" />
				<img class="etalage_source_image" src="rrsprovider/<?= $row -> product_image1?>" class="img-responsive" title="" />
			</li>
			<li>
        <img class="etalage_thumb_image" src="rrsprovider/<?= $row -> product_image2?>" class="img-responsive" />
        <img class="etalage_source_image" src="rrsprovider/<?= $row -> product_image2?>" class="img-responsive" title="" />
			</li>
			<li>
        <img class="etalage_thumb_image" src="rrsprovider/<?= $row -> product_image3?>" class="img-responsive" />
        <img class="etalage_source_image" src="rrsprovider/<?= $row -> product_image3?>" class="img-responsive" title="" />
			</li>
      <li>
        <img class="etalage_thumb_image" src="rrsprovider/<?= $row -> product_image4?>" class="img-responsive" />
        <img class="etalage_source_image" src="rrsprovider/<?= $row -> product_image4?>" class="img-responsive" title="" />
			</li>
      <li>
        <img class="etalage_thumb_image" src="rrsprovider/<?= $row -> product_image5?>" class="img-responsive" />
        <img class="etalage_source_image" src="rrsprovider/<?= $row -> product_image5?>" class="img-responsive" title="" />
			</li>
		</ul>
		</div>
	 </div>
	 <div class="col-md-6 col-md-offset-1">
     <div class="details-left-info">
       <h3 class="product-title" style="margin: 0em 0 1em 0;"><?= $row -> name ?></h3> <br>
       <h4>Description:</h4>
       <p class="product-description"> <?= $row -> desc ?></p> <br> <br>
       <table class="tg table-bordered" style="undefined;table-layout: fixed; width: 608px">
         <colgroup>
         <col style="width: 153px">
         <col style="width: 152px">
         <col style="width: 152px">
         <col style="width: 151px">
         </colgroup>
         <tr>
           <th class="tg-7eod">Hourly Charges</th>
           <th class="tg-7eod">Daily Charges</th>
           <th class="tg-7eod">Weekly Charges</th>
           <th class="tg-7eod">Monthly Charges</th>
         </tr>
         <tr>
           <td class="tg-baqh"><?= $row -> hourly_price ?> Rs.</td>
           <td class="tg-sh4c"><?= $row -> daily_price ?> Rs.</td>
           <td class="tg-baqh"><?= $row -> weekly_price ?> Rs.</td>
           <td class="tg-sh4c"><?= $row -> monthly_price ?> Rs.</td>
         </tr>
         <tr>
            <td class="tg-yw4l" colspan="2"><strong>Pickup Location :</strong> <br> <?= $row -> pickup_location ?></td>
            <td class="tg-yw4l" colspan="2"><strong>Security Deposit : </strong></td>
          </tr>
         <tr>
           <td class="tg-baqh" colspan="4">
             <a href="cart.php?prod=<?= $row -> id ?>" class="col-md-6 col-md-offset-3 btn btn-success">Book Now</a>
           </td>
         </tr>
       </table>
		 </div>
	 </div>
	 <div class="clearfix"></div>
  </div>
</div>
<?php include 'includes/footer.php'; ?>

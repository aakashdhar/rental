<?php include 'includes/header.php'; ?>
<?php
  $result_cat = mysqli_query($con,"SELECT * FROM `tbl_category`");
  $partnerid = $_SESSION['id'];
  $partner_name = $_SESSION['name'];
  if (isset($_GET['edit']) && !empty($_GET['edit'])) {
  $edit_id = $_GET['edit'];
  $sql_edit = "SELECT * FROM `tbl_products` WHERE `id` = '$edit_id'";
  $result_edit = mysqli_query($con,$sql_edit);
  $row = mysqli_fetch_object($result_edit);
  }
  if (isset($_GET['delete']) && !empty($_GET['delete'])) {
  $del_id = $_GET['delete'];
  $sql = "DELETE FROM `tbl_products` WHERE `id` = '$del_id'";
  $result = mysqli_query($con,$sql);
  echo "<script>window.location.href = 'viewproduct.php'</script>";
  }
  if (isset($_POST['submit'])) {
    $plocation = $_POST['plocation'];
    $plocation =  str_replace(' ','+',$plocation);
    $pl =  str_replace('+',' ',$plocation);
    $category = $_POST['category'];
    $subcat = $_POST['subcat'];
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $hprice = $_POST['hprice'];
    $dprice = $_POST['dprice'];
    $wprice = $_POST['wprice'];
    $mprice = $_POST['mprice'];
    $tquantity = $_POST['tquantity'];
    $category = explode('#',$category);
    $categoryid = $category[0];
    $categoryname = $category[1];
    $image_url = $_POST['image_url'];

    $target = "productpic/";
    $target = $target . basename($_FILES['photo']['name']);
    if ($_FILES['photo']['size'] == 0) {
      unset($target);
      $target = $image_url;
    }else {
      $tmpname = $_FILES['photo']['tmp_name'];
      move_uploaded_file($tmpname, $target);
    }
    $geocodeFromAddr = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.$plocation.'&sensor=false');
    $output = json_decode($geocodeFromAddr);
    //Get latitude and longitute from json data
    $latitudestart =  $data['latitude']  = $output->results[0]->geometry->location->lat;
    $longitudestart =  $data['longitude'] = $output->results[0]->geometry->location->lng;
    $sql_get_subcat = "SELECT * FROM `tbl_subcategory` WHERE `id` = '$subcat'";
    $result_get_subcat = mysqli_query($con,$sql_get_subcat);
    $row_get_subcat = mysqli_fetch_object($result_get_subcat);
    $subname = $row_get_subcat -> subcategory_name;


    $sql_insert = "UPDATE `tbl_products` SET `category_id`= '$categoryid',`category_name`='$categoryname',
    `subcategory_id`='$subcat',`subcategory_name`='$subname',`name`='$name',`desc`='$desc',`product_image`='$target',
    `hourly_price`='$hprice',`daily_price`='$dprice',`weekly_price`='$wprice',`monthly_price`='$mprice',
    `pickup_location`= '$pl',`latitude`='$latitudestart',`longitude`='$longitudestart',`total_quantity`= '$tquantity',
    `partner_id`='$partnerid',`partner_name`='$partner_name',`updated_on`= NOW() WHERE `id` = '$edit_id'";
    $result_insert = mysqli_query($con,$sql_insert);

    if ($result_insert) {
        echo "<script>alert('Product Name Updated')</script>";
        echo "<script>window.location.href = 'viewproduct.php'</script>";
      }else{
        echo "<script>alert('Product name updation Failed')</script>";
      }
  }
 ?>
  <section class="content-header">
    <h1>
      Product
      <small>Edit Product</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Here</li>
    </ol>
  </section>
  <section class="content">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title"></h3>
      </div>
      <div class="panel-body">
        <form class="" action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="">Category</label>
            <select class="form-control" name="category" id="category" required>
              <option value="">Select Category</option>
              <?php while($row_cat = mysqli_fetch_object($result_cat)): ?>
                <option value="<?= $row_cat -> id ?>#<?= $row_cat -> category_name ?>"<?= (($row_cat -> id ."#".$row_cat -> category_name == $row -> category_id ."#". $row -> category_name )?' selected':'') ?>><?= $row_cat -> category_name ?></option>
              <?php endwhile; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="">Sub Category</label>
            <label>Previously Selected Value: <?= $row -> subcategory_name ?></label>
            <select class="form-control" name="subcat" id="subcat" required>

            </select>
          </div>
          <div class="form-group">
            <label for="">Product Name</label>
            <input type="text" class="form-control" id="" name="name" value="<?= $row -> name ?>" placeholder="Enter product name" required>
          </div>
          <div class="form-group">
            <label for="">Product Desc</label>
            <textarea name="desc" rows="8" cols="80" class="form-control" placeholder="Enter the product Description" required><?= $row -> desc ?></textarea>
          </div>
          <div class="form-group">
            <label for="">Product Image</label>
            <input type="file" class="form-control" name="photo" multiple>
            <img src="<?= $row -> product_image ?>" height="300" width="300" alt="">
          </div>
          <div class="form-group col-md-3">
            <label for="">Hourly Price</label>
            <input type="number" class="form-control" name="hprice"  value="<?= $row -> hourly_price ?>" id="" placeholder=" Hourly Price " required>
          </div>
          <div class="form-group col-md-3">
            <label for="">Daily Price</label>
            <input type="number" class="form-control" name="dprice"  value="<?= $row -> daily_price ?>" id="" placeholder=" Daily Price " required>
          </div>
          <div class="form-group col-md-3">
            <label for="">Weekly Price</label>
            <input type="number" class="form-control" name="wprice"  value="<?= $row -> weekly_price ?>" id="" placeholder=" Weekly Price " required>
          </div>
          <div class="form-group col-md-3">
            <label for="">Monthly Price</label>
            <input type="number" class="form-control" name="mprice"  value="<?= $row -> monthly_price ?>" id="" placeholder=" Monthly Price " required>
          </div>
          <div class="form-group col-md-6">
            <label for="">Pickup Location</label>
            <input type="text" class="form-control placepicker" name="plocation" value="<?= $row -> pickup_location ?>" id="" placeholder=" Pickup Location " required>
          </div>
          <div class="form-group col-md-6">
            <label for="">Total Quantity</label>
            <input type="number" class="form-control" name="tquantity" value="<?= $row -> total_quantity ?>" id="" placeholder="Total Quantity" required>
          </div>
          <input type="hidden" name="image_url" value="<?= $row -> product_image ?>">
          <input type="submit" name="submit" value="Edit Product" class="form-control btn btn-success">
        </form>
      </div>
    </div>
  </section>
<?php include 'includes/footer.php'; ?>

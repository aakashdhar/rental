<?php include 'includes/header.php'; ?>
<?php

  $result_cat = mysqli_query($con,"SELECT * FROM `tbl_category`");
  $partnerid = $_SESSION['id'];
  $partner_name = $_SESSION['name'];

  if (isset($_POST['submit'])) {
    $plocation = $_POST['plocation'];
    $plocation =  str_replace(' ','+',$plocation);
    $pl =  str_replace('+',' ',$plocation);
    $category = $_POST['category'];
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
    // $filename  = basename($_FILES['file']['name']);
    // $extension = pathinfo($filename, PATHINFO_EXTENSION);
    // $new       = md5($filename).'.'.$extension;
    $target = "productpic/";
    $f1 = basename($_FILES['photo']['name'][0]);
    $f2 = basename($_FILES['photo']['name'][1]);
    $f3 = basename($_FILES['photo']['name'][2]);
    $f4 = basename($_FILES['photo']['name'][3]);
    $f5 = basename($_FILES['photo']['name'][4]);

    $e1 = pathinfo($f1, PATHINFO_EXTENSION);
    $e2 = pathinfo($f2, PATHINFO_EXTENSION);
    $e3 = pathinfo($f3, PATHINFO_EXTENSION);
    $e4 = pathinfo($f4, PATHINFO_EXTENSION);
    $e5 = pathinfo($f5, PATHINFO_EXTENSION);


    $img1 = $target . md5($f1).'.'.$e1;
    $img2 = $target . md5($f2).'.'.$e2;
    $img3 = $target . md5($f3).'.'.$e3;
    $img4 = $target . md5($f4).'.'.$e4;
    $img5 = $target . md5($f5).'.'.$e5;

    copy($_FILES['photo']['tmp_name'][0], $img1);
    copy($_FILES['photo']['tmp_name'][1], $img2);
    copy($_FILES['photo']['tmp_name'][2], $img3);
    copy($_FILES['photo']['tmp_name'][3], $img4);
    copy($_FILES['photo']['tmp_name'][4], $img5);


    $geocodeFromAddr = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.$plocation.'&sensor=false');
    $output = json_decode($geocodeFromAddr);
    //Get latitude and longitute from json data
    $latitudestart =  $data['latitude']  = $output->results[0]->geometry->location->lat;
    $longitudestart =  $data['longitude'] = $output->results[0]->geometry->location->lng;

    $sql_insert = "INSERT INTO `tbl_products`(`category_id`, `category_name`, `name`,
      `desc`, `product_image1`, `product_image2`, `product_image3`, `product_image4`, `product_image5`, `hourly_price`, `daily_price`, `weekly_price`, `monthly_price`, `pickup_location`,
      `latitude`, `longitude`, `total_quantity`, `partner_id`, `partner_name`)
      VALUES ('$categoryid','$categoryname','$name','$desc','$img1','$img2','$img3','$img4','$img5','$hprice','$dprice','$wprice','$mprice',
      '$pl','$latitudestart','$longitudestart','$tquantity','$partnerid','$partner_name')";

    echo "$sql_insert";
    $result_insert = mysqli_query($con,$sql_insert);

    if ($result_insert) {
        echo "<script>alert('Product Name Added')</script>";
        echo "<script>window.location.href = 'viewproduct.php'</script>";
      }else{
        echo "<script>alert('Product name addition Failed')</script>";
      }
  }


 ?>
  <section class="content-header">
    <h1>
      Product
      <small>Add Product</small>
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
                <option value="<?= $row_cat -> id ?>#<?= $row_cat -> category_name ?>"><?= $row_cat -> category_name ?></option>
              <?php endwhile; ?>
            </select>
          </div>
          <!-- <div class="form-group">
            <label for="">Sub Category</label>
            <select class="form-control" name="subcat" id="subcat" required>

            </select>
          </div> -->
          <div class="form-group">
            <label for="">Product Name</label>
            <input type="text" class="form-control" id="" name="name" placeholder="Enter product name" required>
          </div>
          <div class="form-group">
            <label for="">Product Description</label>
            <textarea name="desc" rows="8" cols="80" class="form-control" placeholder="Enter the product Description" required></textarea>
          </div>
          <div class="form-group col-md-4">
            <label for="">Product Image 1</label>
            <input type="file" class="form-control" name="photo[]">
          </div>
          <div class="form-group col-md-4">
            <label for="">Product Image 2</label>
            <input type="file" class="form-control" name="photo[]">
          </div>
          <div class="form-group col-md-4">
            <label for="">Product Image 3</label>
            <input type="file" class="form-control" name="photo[]">
          </div>
          <div class="form-group col-md-6">
            <label for="">Product Image 4</label>
            <input type="file" class="form-control" name="photo[]">
          </div>
          <div class="form-group col-md-6">
            <label for="">Product Image 5</label>
            <input type="file" class="form-control" name="photo[]">
          </div>
          <div class="form-group col-md-3">
            <label for="">Hourly Price</label>
            <input type="number" class="form-control" name="hprice" id="" placeholder=" Hourly Price " required>
          </div>
          <div class="form-group col-md-3">
            <label for="">Daily Price</label>
            <input type="number" class="form-control" name="dprice" id="" placeholder=" Daily Price " required>
          </div>
          <div class="form-group col-md-3">
            <label for="">Weekly Price</label>
            <input type="number" class="form-control" name="wprice" id="" placeholder=" Weekly Price " required>
          </div>
          <div class="form-group col-md-3">
            <label for="">Monthly Price</label>
            <input type="number" class="form-control" name="mprice" id="" placeholder=" Monthly Price " required>
          </div>
          <div class="form-group col-md-6">
            <label for="">Pickup Location</label>
            <input type="text" class="form-control placepicker" name="plocation" id="" placeholder=" Pickup Location " required>
          </div>
          <div class="form-group col-md-6">
            <label for="">Total Quantity</label>
            <input type="number" class="form-control" name="tquantity" id="" placeholder="Total Quantity" required>
          </div>
          <input type="submit" name="submit" value="Submit Product" class="form-control btn btn-success">
        </form>
      </div>
    </div>
  </section>
<?php include 'includes/footer.php'; ?>

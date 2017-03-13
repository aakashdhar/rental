<?php include 'includes/header.php'; ?>
<?php
  $result_cat = mysqli_query($con,"SELECT * FROM `tbl_category`");
  if (isset($_POST['submit'])) {
    $category = $_POST['category'];
    $category = explode('#',$category);

    $catid = $category[0];
    $catname = $category[1];

    $subcat = $_POST['subcat'];
    $subcat = ucwords($subcat);

    $target = "subcategorypics/";
    $target = $target . basename($_FILES['photo']['name']);

    move_uploaded_file($_FILES['photo']['tmp_name'],$target);

    $sql_check = "SELECT * FROM `tbl_subcategory` WHERE `category_name` = '$catname' AND `subcategory_name` = '$subcat'";
    $result_check = mysqli_query($con,$sql_check);

    if (mysqli_num_rows($result_check) > 0) {
      echo "<script>alert('Sub Category Name already exists')</script>";
    }else {
      $sql_insert ="INSERT INTO `tbl_subcategory`(`subcategory_name`, `subcategory_image`, `category_id`, `category_name`)
       VALUES ('$subcat','$target','$catid','$catname')";
      $result_insert = mysqli_query($con,$sql_insert);

      if ($result_insert) {
        echo "<script>alert('Sub Category Name Added')</script>";
        echo "<script>window.location.href = 'viewsubcategory.php'</script>";
      }else{
        echo "<script>alert('Sub Category Name addition Failed')</script>";
      }
    }
  }

 ?>
  <section class="content-header">
    <h1>
      Sub Category
      <small>Add Sub Category</small>
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
          <div class="form-group">
            <label for="">Sub Categroy Name</label>
            <input type="text" class="form-control" id="" name="subcat" placeholder="Sub Categroy Name">
          </div>
          <div class="form-group">
            <label for="">SubCategory Image</label>
            <input type="file" class="form-control" id="" name="photo" placeholder="">
          </div>
          <input type="submit" name="submit" class="form-control btn btn-success" value="Add Sub Category">
        </form>
      </div>
    </div>
  </section>
<?php include 'includes/footer.php'; ?>

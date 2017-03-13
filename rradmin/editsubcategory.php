<?php include 'includes/header.php'; ?>
<?php
  $result_cat = mysqli_query($con,"SELECT * FROM `tbl_category`");
  if (isset($_GET['edit']) && !empty($_GET['edit'])) {
    $edit_id = $_GET['edit'];
    $sql_edit = "SELECT * FROM `tbl_subcategory` WHERE `id` = '$edit_id'";
    $result_edit = mysqli_query($con,$sql_edit);
    $row = mysqli_fetch_object($result_edit);
  }
  if (isset($_GET['delete']) && !empty($_GET['delete'])) {
    $del_id = $_GET['delete'];
    $sql = "DELETE FROM `tbl_subcategory` WHERE `id` = '$del_id'";
    $result = mysqli_query($con,$sql);
    echo "<script>window.location.href = 'viewsubcategory.php'</script>";
  }
  if (isset($_POST['submit'])) {
    $category = $_POST['category'];
    $category = explode('#',$category);
    $image_url = $_POST['image_url'];

    $catid = $category[0];
    $catname = $category[1];

    $subcat = $_POST['subcat'];
    $subcat = ucwords($subcat);

    $target = "subcategorypics/";
    $target = $target . basename($_FILES['photo']['name']);
    if ($_FILES['photo']['size'] == 0) {
      unset($target);
      $target = $image_url;
    }else {
      $tmpname = $_FILES['photo']['tmp_name'];
      move_uploaded_file($tmpname, $target);
    }

    move_uploaded_file($_FILES['photo']['tmp_name'],$target);

    $sql_check = "SELECT * FROM `tbl_subcategory` WHERE `category_name` = '$catname' AND `subcategory_name` = '$subcat' and `id` != '$edit_id'";
    $result_check = mysqli_query($con,$sql_check);

    if (mysqli_num_rows($result_check) > 0) {
      echo "<script>alert('Sub Category Name already exists')</script>";
    }else {
      $sql_insert ="UPDATE `tbl_subcategory` SET `subcategory_name`='$subcat',`subcategory_image`='$target',`category_id`='$catid',
      `category_name`='$catname',`updated_on`= NOW() WHERE `id` = '$edit_id'";
      $result_insert = mysqli_query($con,$sql_insert);

      if ($result_insert) {
        echo "<script>alert('Sub Category Name Updated')</script>";
        echo "<script>window.location.href = 'viewsubcategory.php'</script>";
      }else{
        echo "<script>alert('Sub Category Name updation Failed')</script>";
      }
    }
  }



 ?>
  <section class="content-header">
    <h1>
      Sub Category
      <small>Edit Subcategory</small>
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
                <option value="<?= $row_cat -> id ?>#<?= $row_cat -> category_name ?>"
                  <?= (($row_cat -> id ."#".$row_cat -> category_name == $row -> category_id ."#". $row -> category_name )?' selected':'') ?>>
                  <?= $row_cat -> category_name ?></option>
              <?php endwhile; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="">Sub Categroy Name</label>
            <input type="text" class="form-control" id="" name="subcat" value="<?= $row -> subcategory_name ?>" placeholder="Sub Categroy Name">
          </div>
          <div class="form-group">
            <label for="">SubCategory Image</label>
            <input type="file" class="form-control" id="" name="photo" placeholder="">
            <img src="<?= $row -> subcategory_image ?>" class="img-responsive img-thumbnail" alt="">
          </div>
          <input type="hidden" name="image_url" value="<?= $row -> subcategory_image ?>">
          <input type="submit" name="submit" class="form-control btn btn-success" value="Edit Sub Category">
        </form>
      </div>
    </div>
  </section>
<?php include 'includes/footer.php'; ?>

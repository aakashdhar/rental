<?php include 'includes/header.php'; ?>
<?php
  if (isset($_GET['edit']) && !empty($_GET['edit'])) {
    $edit_id = $_GET['edit'];
    $sql_edit = "SELECT * FROM `tbl_category` WHERE `id` = '$edit_id'";
    $result_edit = mysqli_query($con,$sql_edit);
    $row = mysqli_fetch_object($result_edit);
  }
  if (isset($_GET['delete']) && !empty($_GET['delete'])) {
    $del_id = $_GET['delete'];
    $sql = "DELETE FROM `tbl_category` WHERE `id` = '$del_id'";
    $result = mysqli_query($con,$sql);
    echo "<script>window.location.href = 'viewcategory.php'</script>";
  }
  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $name = ucwords($name);
    $image_url = $_POST['image_url'];

    $target = "categorypic/";
    $target = $target . basename($_FILES['photo']['name']);

    if ($_FILES['photo']['size'] == 0) {
      unset($target);
      $target = $image_url;
    }else {
      $tmpname = $_FILES['photo']['tmp_name'];
      move_uploaded_file($tmpname, $target);
    }

    $sql_check = "SELECT * FROM `tbl_category` WHERE `category_name` = '$name' and `id` != '$edit_id'";
    $result_check = mysqli_query($con,$sql_check);

    if (mysqli_num_rows($result_check) > 0) {
      echo "<script>alert('Category Name already exists')</script>";
    }else {
      $sql_insert ="UPDATE `tbl_category` SET `category_name`='$name',`category_image`='$target',`updated_on`= NOW()
      WHERE `id` = '$edit_id'";
      $result_insert = mysqli_query($con,$sql_insert);

      if ($result_insert) {
        echo "<script>alert('Category Name Updated')</script>";
        echo "<script>window.location.href = 'viewcategory.php'</script>";
      }else{
        echo "<script>alert('Category Name Updation Failed')</script>";
      }
    }
  }

 ?>
  <section class="content-header">
    <h1>
      Page Header
      <small>Optional description</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
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
            <label for="">Category Name</label>
            <input type="text" class="form-control" name="name" value="<?= $row -> category_name ?>" id="" placeholder="Enter Name">
          </div>
          <div class="form-group">
            <label for="">Category Image</label>
            <input type="file" class="form-control" id="" name="photo" placeholder="">
            <img src="<?= $row -> category_image ?>"  class="img-responsive img-thumbnail" alt="">
          </div>
          <input type="hidden" name="image_url" value="<?= $row -> category_image ?>">
          <input type="submit" name="submit" class="form-control btn btn-success" value="Edit Category">
        </form>
      </div>
    </div>
  </section>
<?php include 'includes/footer.php'; ?>

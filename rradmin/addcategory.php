<?php include 'includes/header.php'; ?>
<?php

  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $name = ucwords($name);

    $target = "categorypic/";
    $target = $target . basename($_FILES['photo']['name']);

    move_uploaded_file($_FILES['photo']['tmp_name'],$target);

    $sql_check = "SELECT * FROM `tbl_category` WHERE `category_name` = '$name'";
    $result_check = mysqli_query($con,$sql_check);

    if (mysqli_num_rows($result_check) > 0) {
      echo "<script>alert('Category Name already exists')</script>";
    }else {
      $sql_insert ="INSERT INTO `tbl_category`(`category_name`, `category_image`) VALUES ('$name','$target')";
      $result_insert = mysqli_query($con,$sql_insert);

      if ($result_insert) {
        echo "<script>alert('Category Name Added')</script>";
        echo "<script>window.location.href = 'viewcategory.php'</script>";
      }else{
        echo "<script>alert('Category Name addition Failed')</script>";
      }
    }
  }

 ?>
  <section class="content-header">
    <h1>
      Category
      <small>Add Category</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
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
            <input type="text" class="form-control" name="name" id="" placeholder="Enter Name">
          </div>
          <div class="form-group">
            <label for="">Category Image</label>
            <input type="file" class="form-control" id="" name="photo" placeholder="">
          </div>
          <input type="submit" name="submit" class="form-control btn btn-success" value="Add Category">
        </form>
      </div>
    </div>
  </section>
<?php include 'includes/footer.php'; ?>

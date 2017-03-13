<?php include 'includes/header.php'; ?>
<?php
  if (isset($_GET['edit']) && !empty($_GET['edit'])) {
    $edit_id = $_GET['edit'];
    $sql_edit = "SELECT * FROM `tbl_user` WHERE `id` = '$edit_id'";
    $result_edit = mysqli_query($con,$sql_edit);
    $row = mysqli_fetch_object($result_edit);
  }
  if (isset($_GET['delete']) && !empty($_GET['delete'])) {
    $del_id = $_GET['delete'];
    $sql = "DELETE FROM `tbl_user` WHERE `id` = '$del_id'";
    $result = mysqli_query($con,$sql);
    echo "<script>window.location.href = 'viewuser.php'</script>";
  }
  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $name = ucwords($name);
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql_check = "SELECT * FROM `tbl_user` WHERE `username` = '$username' and `id` != '$edit_id'";
    $result_check = mysqli_query($con,$sql_check);

    if (mysqli_num_rows($result_check) > 0) {
      echo "<script>alert('username already exist')</script>";
    }else{

      $sql_insert = "UPDATE `tbl_user` SET `name`='$name',`username`='$username',`password`='$password',`email`='$email',
      `mobile`='$phone',`updated_on`= NOW() WHERE `id` = '$edit_id'";
      $result_insert = mysqli_query($con,$sql_insert);

      if ($result_insert) {
        echo "<script>alert('username Name updated')</script>";
        echo "<script>window.location.href = 'viewuser.php'</script>";
      }else{
        echo "<script>alert('username updation Failed')</script>";
      }
    }
  }


 ?>
  <section class="content-header">
    <h1>
      User
      <small>Edit User</small>
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
        <form class="" action="" method="post">
          <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" name="name"  value ="<?= $row -> name ?>" id="" placeholder="Enter NAME" required>
          </div>
          <div class="form-group">
            <label for="">Username</label>
            <input type="text" class="form-control" name="username"  value ="<?= $row -> username ?>" id="" placeholder="Enter username" required>
          </div>
          <div class="form-group">
            <label for="">Password</label>
            <input type="text" class="form-control" name="password"  value ="<?= $row -> password ?>" id="" placeholder="enter password" required>
          </div>
          <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email"  value ="<?= $row -> email  ?>" id="" placeholder="Enter email" required>
          </div>
          <div class="form-group">
            <label for="">Phone</label>
            <input type="text" class="form-control" name="phone"  value ="<?= $row -> phone  ?>" id="" placeholder="Enter phone numnber" required>
          </div>
          <input type="submit" name="submit" value="Create User" class="form-control btn btn-success">
        </form>
      </div>
    </div>

  </section>
<?php include 'includes/footer.php'; ?>

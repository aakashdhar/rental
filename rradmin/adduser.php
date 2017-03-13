<?php include 'includes/header.php'; ?>
<?php
  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $name = ucwords($name);
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql_check = "SELECT * FROM `tbl_user` WHERE `username` = '$username'";
    $result_check = mysqli_query($con,$sql_check);

    if (mysqli_num_rows($result_check) > 0) {
      echo "<script>alert('username already exist')</script>";
    }else{

      $sql_insert = "INSERT INTO `tbl_user`(`name`, `username`, `password`, `email`, `mobile`)
      VALUES ('$name','$username','$password','$email','$phone')";
      $result_insert = mysqli_query($con,$sql_insert);

      if ($result_insert) {
        echo "<script>alert('username Name Added')</script>";
        echo "<script>window.location.href = 'viewuser.php'</script>";
      }else{
        echo "<script>alert('username addition Failed')</script>";
      }
    }
  }


 ?>
  <section class="content-header">
    <h1>
      User
      <small>Add User</small>
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
            <input type="text" class="form-control" name="name"  value ="" id="" placeholder="Enter NAME" required>
          </div>
          <div class="form-group">
            <label for="">Username</label>
            <input type="text" class="form-control" name="username"  value ="" id="" placeholder="Enter username" required>
          </div>
          <div class="form-group">
            <label for="">Password</label>
            <input type="text" class="form-control" name="password"  value ="" id="" placeholder="enter password" required>
          </div>
          <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email"  value ="" id="" placeholder="Enter email" required>
          </div>
          <div class="form-group">
            <label for="">Phone</label>
            <input type="number" class="form-control" name="phone"  value ="" id="" placeholder="Enter phone numnber" required>
          </div>
          <input type="submit" name="submit" value="Create User" class="form-control btn btn-success">
        </form>
      </div>
    </div>
  </section>
<?php include 'includes/footer.php'; ?>

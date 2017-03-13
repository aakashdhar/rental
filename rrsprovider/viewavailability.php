<?php include 'includes/header.php'; ?>
<?php
  $sql_tot = "SELECT * FROM `tbl_products` WHERE `partner_id` = '".$_SESSION['id']."'";
  $result_tot = mysqli_query($con,$sql_tot);

  if (isset($_POST['submit'])) {
    $quantity = $_POST['quantity'];
    $total = $_POST['total'];
    $booking = $_POST['booking'];
    $id = $_POST['id'];
    $sql_update = "UPDATE `tbl_products` SET `booked_quantity`= '$quantity' where `id` = '$id'";
    $result_update = mysqli_query($con,$sql_update);

    if ($result_update) {
      echo "<script>window.location.href = 'viewavailability.php'</script>";
    }
  }
 ?>
  <section class="content-header">
    <h1>
      Available
      <small>View Available</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Here</li>
    </ol>
  </section>
  <section class="content">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Name</th>
          <th>Total</th>
          <th>Booked</th>
          <th>Current</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = mysqli_fetch_object($result_tot)): ?>
          <tr>
            <td><?= $row -> name ?></td>
            <td><?= $row -> total_quantity ?></td>
            <td><?= $row -> booked_quantity ?></td>
            <td><?= ($row -> total_quantity - $row -> booked_quantity) ?></td>
            <td>
              <form class="" action="" method="post">
                <input type="text" name="quantity" placeholder="enter quantity" class="form-control">
                <input type="hidden" name="total" value="<?= $row -> total_quantity ?>">
                <input type="hidden" name="booking" value="<?= $row -> booked_quantity ?>">
                <input type="hidden" name="id" value="<?= $row -> id ?>">
                <input type="submit" name="submit" value="Submit Quantity">
              </form>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </section>
<?php include 'includes/footer.php'; ?>

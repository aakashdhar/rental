<?php include 'includes/header.php'; include 'includes/snav.php'; ?>
<?php
if (isset($_GET['prod'])) {
  $id = $_GET['prod'];
  $result = mysqli_query($con,"SELECT * FROM `tbl_products` WHERE `id` = '$id'");
  $row = mysqli_fetch_object($result);
}
 ?>
<div id="about"  class="container spacer">
  <div class="col-md-10 col-md-offset-1">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Book Your Product</h3>
      </div>
      <div class="panel-body">
        <form class="form" action="" method="post">
          <div class="form-group col-md-4">
            <label for="">Name</label>
            <input type="text" class="form-control" id="" placeholder="Enter Name" required>
          </div>
          <div class="form-group col-md-4">
            <label for="">Mobile</label>
            <input type="number" max="10" class="form-control" id="" placeholder="Enter Mobile Number" required>
          </div>
          <div class="form-group col-md-4">
            <label for="">Location</label>
            <input type="text" class="form-control placepicker" id="" placeholder="Enter Location" required>
          </div>
          <div class="form-group col-md-12">
            <label for="">Select Package</label>
            <select class="form-control" name="" id="package" required>
              <option value="">Select Package</option>
              <option value="hourly">Hourly ::  <?= $row -> hourly_price  ?></option>
              <option value="daily">Daily ::  <?= $row -> daily_price  ?></option>
              <option value="weekly">Weekly ::  <?= $row -> weekly_price  ?></option>
              <option value="monthly">Montly ::  <?= $row -> monthly_price  ?></option>
            </select>
          </div>
          <div id="day" style="display:none">
            <div class="form-group col-md-3">
              <label for="">Start Date</label>
              <input type="date" min="<?= date('Y-m-d') ?>" class="form-control" value="<?= date('Y-m-d')?>" id="" placeholder="">
            </div>
            <div class="form-group col-md-3">
              <label for="">Start Time</label>
              <input type="text" class="form-control clockpicker" id="" placeholder="">
            </div>
            <div class="form-group col-md-3">
              <label for="">End Date</label>
              <input type="date" min="<?= date('Y-m-d') ?>" class="form-control" id="" placeholder="">
            </div>
            <div class="form-group col-md-3">
              <label for="">End Time</label>
              <input type="text" class="form-control clockpicker" id="" placeholder="">
            </div>
          </div>
          <div id="hourly" style="display:none">
            <div class="form-group col-md-3">
              <label for="">Start Date</label>
              <input type="date" min="<?= date('Y-m-d') ?>"  value="<?= date('Y-m-d') ?>" class="form-control" id="" placeholder="">
            </div>
            <div class="form-group col-md-3">
              <label for="">Start Time</label>
              <input type="text" class="form-control clockpicker" id="" placeholder="">
            </div>
            <div class="form-group col-md-3">
              <label for="">End Date</label>
              <input type="date" min="<?= date('Y-m-d') ?>"  value="<?= date('Y-m-d') ?>" class="form-control" id="" placeholder="">
            </div>
            <div class="form-group col-md-3">
              <label for="">End Time</label>
              <input type="text" class="form-control clockpicker" id="" placeholder="">
            </div>
          </div>
          <div id="mnths" style="display:none">
            <div class="form-group col-md-6">
              <label for="">No Of Months</label>
              <input type="number" min="1" class="form-control" id="" placeholder="">
            </div>
          </div>
          <div id="wks" style="display:none">
            <div class="form-group col-md-6">
              <label for="">No Of Weeks</label>
              <input type="text" min="1" class="form-control" id="" placeholder="">
            </div>
          </div>
          <input type="submit" name="submit" class="pull-right btn btn-success" value="Book Now">
        </form>
      </div>
    </div>
  </div>
</div>
<?php include 'includes/footer.php'; ?>

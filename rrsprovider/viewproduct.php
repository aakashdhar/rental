<?php include 'includes/header.php'; ?>
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
        <table class="table" id="addprodtable">
    			<thead>
    				<tr>
    					<th>S.no</th>
              <th>Name</th>
              <th>Daily Price</th>
              <th>Hourly Price</th>
              <th>Weekly Price</th>
    					<th>Monthly Price</th>
              <th>Pickup location</th>
              <th>Quantity</th>
    					<th>Action</th>
    				</tr>
    			</thead>
    		</table>
      </div>
    </div>
  </section>
<?php include 'includes/footer.php'; ?>

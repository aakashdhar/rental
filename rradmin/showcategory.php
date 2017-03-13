<?php include 'core/init.php'; ?>
<?php
  $output = array('data' => array());

  $sql = "SELECT * FROM `tbl_category`";
  $query = mysqli_query($con,$sql);

  $x = 1;
  while ($row = mysqli_fetch_assoc($query)) {
    $image = '<img src='.$row['category_image'].' alt="" class="img-responsive img-thumbnail" />';
    $actionButton = '
  	<div class="btn-group">
  	  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  	    Action <span class="caret"></span>
  	  </button>
  	  <ul class="dropdown-menu">
  	    <li><a href="editcategory.php?edit='.$row['id'].'"><span class="fa fa-pencil"></span> Edit</a></li>
  	    <li><a href="editcategory.php?delete='.$row['id'].'"><span class="fa fa-trash-o"></span> Delete</a></li>
      </ul>
  	</div>';
    $output['data'][] = array(
  		$x,
  		$row['category_name'],
  		$image,
  		$actionButton
  	);

  	$x++;
  }
  echo json_encode($output);
 ?>

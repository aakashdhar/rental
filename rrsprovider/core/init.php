<?php

  session_start();
  $con = mysqli_connect('localhost','root','','valuetru_rr');

  if (!$con) {
    die('Error connection to database');
  }

 ?>

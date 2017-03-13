<?php

  session_start();
  date_default_timezone_set('Asia/Kolkata');

  $con = mysqli_connect('localhost','root','','valuetru_rr');

  if (!$con) {
    die('Failed to connect to the database. We will fix it asap');
  }

 ?>

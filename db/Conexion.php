<?php
$con = mysqli_connect("localhost","root","","db");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

session_start();
?>
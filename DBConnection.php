<?php
  $conn = mysqli_connect('localhost','root','','leave letter management');
  
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error."<br>");
  }
?>
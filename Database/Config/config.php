<?php
$mysqli = new mysqli("localhost","root","","CakeShop");
// Check connection
if ($mysqli -> connect_errno) {
  die("Connection failed: " . $conn->connect_error);
}
?>

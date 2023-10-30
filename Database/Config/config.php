<?php
$mysqli = new mysqli("localhost","root","","cakeshop");
// Check connection
if ($mysqli -> connect_errno) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>

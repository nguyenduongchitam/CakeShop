<?php
$mysqli = new mysqli("localhost","root","","CakeShop");
// kiểm tra kết nối
if ($mysqli -> connect_errno) {
  die("Connection failed: " . $conn->connect_error);
}

?>
<?php
include("../config.php");
$coupon_code= $_POST['coupon_code'];
$discount_percentage=$_POST['discount_percentage'];
$cart_min=$_POST['cart_min'];
$start_date=$_POST['start_date'];
$end_date=$_POST['end_date'];
$quantity=$_POST['quantity'];
if(isset($_POST['insert'])){  
    $sql_add = "INSERT INTO coupon(coupon_code,discount_percentage,cart_min, start_date, end_date,quantity) VALUES ('".$coupon_code."','".$discount_percentage."','".$cart_min."','".$start_date."','".$end_date."','".$quantity."')";  
   mysqli_query($mysqli,$sql_add);
   header('Location:../index.php?action=quanlykhuyenmai&query=none');
}   
mysqli_close($mysqli);
?>  
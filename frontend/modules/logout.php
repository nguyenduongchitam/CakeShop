<?php 
session_start();

if(isset($_SESSION['dangnhap'])&&($_SESSION['dangnhap']!=""))
{
    unset($_SESSION['dangnhap']);
    unset($_SESSION['cart']);
    unset($_SESSION['quantity_in_cart']);
}
header('location:index.php');
?>
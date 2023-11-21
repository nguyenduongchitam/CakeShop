<?php 
session_start();

if(isset($_SESSION['dangnhap'])&&($_SESSION['dangnhap']!=""))
{
    unset($_SESSION['dangnhap']);
}
header('location:index.php');
?>
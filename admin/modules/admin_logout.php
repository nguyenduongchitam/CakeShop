<?php
session_start();
if(isset($_POST['dangnhap'])&&$_SESSION['dangnhap']!="")
{
    unset($_SESSION['dangnhap']);
}
header("Location:admin_login.php");
?>
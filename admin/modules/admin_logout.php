<?php
session_start();
if(isset($_SESSION['dangnhap'])&&$_SESSION['dangnhap']==true)
{
    $_SESSION['dangnhap']=false;
}
header("Location:admin_login.php");
?>
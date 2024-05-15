<?php
session_start();
if(isset($_SESSION['dangnhap-admin'])&&$_SESSION['dangnhap-admin']==true)
{
    $_SESSION['dangnhap-admin']=false;
}
header("Location:admin_login.php");
?>
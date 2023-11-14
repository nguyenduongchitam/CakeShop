<?php
include("../config.php");
$email= $_POST['email'];
$password=$_POST['password'];
$fullname=$_POST['fullname'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$role=$_POST['role'];
if(isset($_POST['insert']))
{   
    $sql_add = "INSERT INTO user(email,password,full_name, phone_number, address) VALUES ('".$email."','".$password."','".$fullname."','".$phone."','".$address."')";
   mysqli_query($mysqli,$sql_add);
   header('Location:../index.php?action=quanlytaikhoan&query=none');
}   
mysqli_close($mysqli);
?>
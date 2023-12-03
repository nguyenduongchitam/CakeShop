<?php
include("../config.php");
$email= $_POST['email'];
$password=$_POST['password'];
$hashedPassword=password_hash($password, PASSWORD_DEFAULT);
$fullname=$_POST['fullname'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$role=$_POST['role_id'];
if(isset($_POST['insert']))
{   
    $sql_add = "INSERT INTO user(email,full_name, phone_number, address,password,role_id,create_at,update_at) VALUES ('".$email."','".$fullname."','".$phone."','".$address."','".$hashedPassword."',".$role.",now(),now())";
   mysqli_query($mysqli,$sql_add);
   header('Location:../index.php?action=quanlytaikhoan&query=none');
}   
mysqli_close($mysqli);
?>
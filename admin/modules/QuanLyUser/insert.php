<?php
include("../config.php");
$email= $_POST['email'];
$password=$_POST['password'];
$fullname=$_POST['fullname'];
$phone=$_POST['phone'];
$address=$_POST['address'];
date_default_timezone_set('Asia/Ho_Chi_Minh');
$create_at = date("Y-m-d H:i:s");
$update_at = date("Y-m-d H:i:s"); 
if(isset($_POST['insert'])){  
if (isset($_POST['selectOption'])) {
    $selectedOption = $_POST['selectOption'];
} 
    $sql_add = "INSERT INTO user(email,password,full_name, phone_number, address,role_id , create_at, update_at) VALUES ('".$email."','".$password."','".$fullname."','".$phone."','".$address."','".$selectedOption."','".$create_at."', '".$update_at."')";  
   mysqli_query($mysqli,$sql_add);
   header('Location:../index.php?action=quanlytaikhoan&query=none');
}   
mysqli_close($mysqli);
?>  
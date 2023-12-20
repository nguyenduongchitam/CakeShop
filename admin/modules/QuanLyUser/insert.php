<?php
include("../config.php");
$email= $_POST['email'];
$password=$_POST['password'];
$hashedPassword=password_hash($password, PASSWORD_DEFAULT);
$fullname=$_POST['fullname'];
$phone=$_POST['phone'];
$address=$_POST['address'];
if(isset($_POST['insert'])){  
if (isset($_POST['selectOption'])) {
    $selectedOption = $_POST['selectOption'];
} 
    $sql_add = "INSERT INTO user(email,password,full_name, phone_number, address,role_id ,create_at,update_at) VALUES ('".$email."','".$hashedPassword."','".$fullname."','".$phone."','".$address."','".$selectedOption."',now(), now())";  
   mysqli_query($mysqli,$sql_add);
   header('Location:../index.php?action=quanlytaikhoan&query=none');
}   
mysqli_close($mysqli);
?>  
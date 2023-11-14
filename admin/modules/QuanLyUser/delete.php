<?php
include("../config.php");
if(isset($_GET['query'])=='delete')
{   $email = $_GET['email'];
    $sql_delete = "Delete from user where email='".$email."'";
   mysqli_query($mysqli,$sql_delete);
   header('Location:../index.php?action=quanlytaikhoan&query=none');
} 
mysqli_close($mysqli);
?>
<?php
include("../config.php");
if(isset($_GET['query'])=='delete')
{   $user_id = $_GET['user_id'];
    $sql_delete = "Delete from user where user_id='".$user_id."'";
   mysqli_query($mysqli,$sql_delete);
   header('Location:../index.php?action=quanlytaikhoan&query=none');
} 
mysqli_close($mysqli);
?>
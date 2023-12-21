<?php
include("../config.php");
if(isset($_GET['query'])=='delete')
{   $coupon_id = $_GET['coupon_id'];
    $sql_delete = "Delete from coupon where coupon_id='".$coupon_id."'";
   mysqli_query($mysqli,$sql_delete);
   header('Location:../index.php?action=quanlykhuyenmai&query=none');
} 
mysqli_close($mysqli);
?>
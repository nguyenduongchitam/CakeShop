<?php
include("../config.php");
if(isset($_GET['query'])=='delete')
{   $product_id = $_GET['product_id'];
    $sql_delete = "Delete from product where product_id='".$product_id."'";
   mysqli_query($mysqli,$sql_delete);
  header('Location:../index.php?action=quanlysanpham&query=none');
} 
mysqli_close($mysqli);
?>
<?php
include("../config.php");
if(isset($_GET['query'])=='delete')
{   $order_id = $_GET['order_id'];
    $sql_delete = "Delete from `order` where order_id='".$order_id."'";
   mysqli_query($mysqli,$sql_delete);
  header('Location:../index.php?action=quanlyhoadon&query=none');
} 
mysqli_close($mysqli);
?>
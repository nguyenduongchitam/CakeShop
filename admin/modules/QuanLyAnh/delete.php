<?php
include("../../../Database/Config/config.php");
$product_id = $_GET['product_id'];
if(isset($_GET['query'])=='delete')
{   $gallery_id = $_GET['gallery_id'];
    $sql_delete = "Delete from gallery where gallery_id='".$gallery_id."'";
   mysqli_query($mysqli,$sql_delete);
  header('Location:../index.php?action=quanlyanh&query=none&product_id='.$product_id.'');
} 
mysqli_close($mysqli);
?>
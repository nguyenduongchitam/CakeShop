<?php
include("../../../Database/Config/config.php");
$product_id=$_POST['product_id'];
      $thumbnail = $_FILES['thumbnail']['name'];
    $thumbnail_temp = $_FILES['thumbnail']['tmp_name'];
if(isset($_POST['insert']))
{  
    $sql_add = "INSERT INTO `gallery`(`product_id`, `thumbnail`) VALUES ($product_id,'$thumbnail')";
   mysqli_query($mysqli,$sql_add);
 move_uploaded_file($thumbnail_temp,'../../../Database/Images/'.$thumbnail);
   header('Location:../index.php?action=quanlyanh&query=none&product_id='.$product_id.'');
}   
mysqli_close($mysqli);
?>
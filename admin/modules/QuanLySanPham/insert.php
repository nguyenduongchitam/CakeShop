<?php
include("../../../Database/Config/config.php");
$category_id= $_POST['name'];
$title= $_POST['title'];
$price= $_POST['price'];
$discount_price= $_POST['discount_price'];
    $thumbnail = $_FILES['thumbnail']['name'];
    $thumbnail_temp = $_FILES['thumbnail']['tmp_name'];
$description= $_POST['description'];

date_default_timezone_set('Asia/Ho_Chi_Minh');
$created_at = date("Y-m-d H:i:s");
$update_at = date("Y-m-d H:i:s");  

if(isset($_POST['insert']))
{   
    $sql_add = "INSERT INTO `product`(`category_id`, `title`, `price`, `discount_price`, `thumbnail`, `description`,created_at,update_at) VALUES (".$category_id.",'".$title."',".$price.",".$discount_price.",'".$thumbnail."','".$description."','$created_at','$update_at')";
   mysqli_query($mysqli,$sql_add);
 move_uploaded_file($thumbnail_temp,'../../../Database/Images/'.$thumbnail);
   header('Location:../index.php?action=quanlysanpham&query=none');
}   
mysqli_close($mysqli);
?>
<?php
include("../../../Database/Config/config.php");
$category_id= $_POST['name'];
$title= $_POST['title'];
$price= $_POST['price'];
$discount_price= $_POST['discount_price'];
    $thumbnail = $_FILES['thumbnail']['name'];
    $thumbnail_temp = $_FILES['thumbnail']['tmp_name'];
$description= $_POST['description'];
if(isset($_POST['insert']))
{   
    $sql_add = "INSERT INTO `product`(`category_id`, `title`, `price`, `discount_price`, `thumbnail`, `description`) VALUES (".$category_id.",'".$title."',".$price.",".$discount_price.",'".$thumbnail."','".$description."')";
   mysqli_query($mysqli,$sql_add);
   move_uploaded_file($thumbnail_temp,'images/'.$thumbnail);
   header('Location:../index.php?action=quanlysanpham&query=none');
}   
mysqli_close($mysqli);
?>
<?php
include("../../../Database/Config/config.php");
$title= $_POST['title'];
$content= $_POST['content'];
$anh = $_FILES['anh']['name'];
    $anh_temp = $_FILES['anh']['tmp_name'];
date_default_timezone_set('Asia/Ho_Chi_Minh');
$publish_date= date("Y-m-d H:i:s");

if(isset($_POST['insert']))
{   
  $sql_add = "INSERT INTO `news`(`title`, `content`, `thumbnail`, `publish_date`) VALUES ('$title','$content','$anh','$publish_date')";
  mysqli_query($mysqli,$sql_add);
  move_uploaded_file($anh_temp,'../../../Database/Images/'.$anh);
  header('Location:../index.php?action=quanlytintuc&query=none');
}   
mysqli_close($mysqli);
?>
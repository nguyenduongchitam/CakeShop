<?php
include("../config.php");
if(isset($_GET['query'])=='delete')
{   $category_id = $_GET['category_id'];
    $sql_delete = "Delete from category where category_id='".$category_id."'";
   mysqli_query($mysqli,$sql_delete);
   header('Location:../index.php?action=quanlydanhmucsanpham&query=none');
} 
mysqli_close($mysqli);
?>
<?php
include("../config.php");
if(isset($_GET['query'])=='delete')
{   $tintuc_id = $_GET['tintuc_id'];
    $sql_delete = "Delete from tintuc where tintuc_id='".$tintuc_id."'";
   mysqli_query($mysqli,$sql_delete);
  header('Location:../index.php?action=quanlytintuc&query=none');
} 
mysqli_close($mysqli);
?>
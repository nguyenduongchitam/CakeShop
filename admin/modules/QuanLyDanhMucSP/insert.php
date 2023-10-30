<?php
include("../config.php");
$name= $_POST['name'];
if(isset($_POST['insert']))
{   
    $sql_add = "INSERT INTO category(name) VALUES ('".$name."')";
   mysqli_query($mysqli,$sql_add);
   header('Location:../index.php?action=quanlydanhmucsanpham&query=none');
}   
mysqli_close($mysqli);
?>
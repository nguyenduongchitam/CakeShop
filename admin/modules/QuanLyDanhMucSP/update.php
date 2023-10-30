<!-- truy vấn dữ liệu -->
<?php
include("config.php");
$category_id = $_GET ['category_id'];
$sql_select = "SELECT * from category where category_id=$category_id limit 1";
$sql = mysqli_query($mysqli,$sql_select);
?> 
<!-- nạp dữ liệu vào ô -->
<table border='1' align="center">
<form method="POST">
<?php
while($row= mysqli_fetch_array($sql))
{
?>
<tr>
    <td>Tên danh mục</td>
    <td><input type="text" name='name' value="<?php echo $row['name'] ?>"></input></td>
</tr>
<tr>
    <td ><input type="submit" name="update" value="Sửa danh mục sản phẩm"></input> </td>
    <td><input type="submit" name="return" value="Hủy việc chỉnh sửa"></input></td> 
</tr>
<?php
}
?>
</form>
</table>
<!-- thực hiện việc update giá trị -->
<?php
if (isset($_POST['update']))
{
$name= $_POST['name'];
echo $name;
$sql_update = " UPDATE category SET name = '$name' WHERE category_id = $category_id ";
mysqli_query($mysqli,$sql_update);
header('Location:../modules/index.php?action=quanlydanhmucsanpham&query=none');
}
else if (isset($_POST['return'])) header('Location:../modules/index.php?action=quanlydanhmucsanpham&query=none');
?>


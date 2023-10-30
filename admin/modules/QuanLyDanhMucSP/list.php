<?php
include("config.php");
$sql="select * from category";
$resut= mysqli_query($mysqli,$sql);
?>
<p align="center"> danh sách các danh mục </p>
<table border='1' align="center" style="margin-top: 10px;">
<tr>
    <th>Thứ tự</th>
    <th>Tên danh mục</th>
    <th>Xóa</th>
    <th>Sửa</th>
</tr> 
<?php
$i=0;
while($row= mysqli_fetch_array($resut))
{
$i++;
?>

<tr>
<td><?php echo $i?></td>
<td><?php echo $row['name'] ?></td>
<td><a onclick="return del('<?php echo $row['name']?>')" href="QuanLyDanhMucSP/delete.php?query=delete&category_id=<?php echo $row['category_id'] ?>" >Xóa </a></td>
<td><a  href="?action=quanlydanhmucsanpham&query=update&category_id=<?php echo $row['category_id'] ?>"> Sửa </a></td>
</tr>
<?php
}
?>
</table>
<script>
    function del(name)
    {
        return confirm("Bạn có chắc chắn là muốn xóa danh mục : "+name+" không ?");
    }
</script>
<?php
include("config.php");
$sql="select * from  user";
$resut= mysqli_query($mysqli,$sql);
?>
<h1 align="center"> Danh sách tài khoản </h1>
<table border='1' align="center" style="margin-top: 10px;">
<tr>
    <th>Thứ tự</th>
    <th>Email</th>
    <th>Số điện thoại</th>
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
<td><?php echo $row['email'] ?></td>
<td><?php echo $row['phone_number']?></td>
<td><a onclick="return del('<?php echo $row['email']?>')" href="QuanLyUser/delete.php?query=delete&user_id=<?php echo $row['user_id'] ?>" >Xóa </a></td>
<td><a href="?action=quanlytaikhoan&query=update&user_id=<?php echo $row['user_id'] ?>"> Sửa </a></td>
</tr>
<?php
}
?>
</table>
<script>
    function del(email)
    {
        return confirm("Bạn có chắc chắn là muốn tài khoản : "+email+" không ?");
    }
</script>
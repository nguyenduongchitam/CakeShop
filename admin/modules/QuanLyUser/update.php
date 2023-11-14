
<?php
include("config.php");
$email = $_GET ['email'];
$sql_select = "SELECT * from user where email=$email limit 1";
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
        <td>Nhập email</td>
        <td><input type="email" name="email" value="<?php echo $row['email']?>"></td>
    </tr>
    <tr>
        <td>Nhập mật khẩu</td>
        <td><input type="text" name="password" value="<?php echo $row['password'] ?>"></input></td>
    </tr>
    <tr>
        <td>Họ tên</td>
        <td><input type="text" name="fullname"value="<?php echo $row['fullname'] ?>"></input> </td>
    </tr>
    <tr>
        <td><label for="phone">Số điện thoại</label></td>
        <td><input type="tel" name="phone" value="<?php echo $row['phone_number'] ?>"></input></td>
    </tr>
    <tr>
        <td>Địa chỉ</td>
        <td><input type="text" name="address" value="<?php echo $row['address'] ?>"></input></td>
    </tr>
    <tr>
        <td>Quyền</td>
        <td><input type="text" name="role" value="<?php echo $row['role'] ?>"></input></td>
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
header('Location:../modules/index.php?action=quanlytaikhoan&query=none');
}
else if (isset($_POST['return'])) header('Location:../modules/index.php?action=quanlydanhmucsanpham&query=none');
?>


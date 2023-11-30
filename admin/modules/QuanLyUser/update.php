<?php
include("config.php");
$user_id = $_GET['user_id'];
$sql_select = " SELECT * from user where user_id=$user_id";
$sql = mysqli_query($mysqli,$sql_select);
?> 
<div class="container">
        <h2 class="text-center">Chỉnh sửa thông tin tài khoản</h2>
        <table class="table table-bordered" align="center">
            <form method="POST" enctype="multipart/form-data">
<?php
while($row= mysqli_fetch_array($sql))
{
?>
<tr>
        <td>Nhập email</td>
        <td><input type="email" name="email" value="<?php echo $row['email']?>" class="form-control"></td>
    </tr>
    <tr>
        <td>Nhập mật khẩu</td>
        <td><input type="text" name="password" value="<?php echo $row['password'] ?>" class="form-control"></input></td>
    </tr>
    <tr>
        <td>Họ tên</td>
        <td><input type="text" name="full_name" value="<?php echo $row['full_name'] ?>" class="form-control"></input> </td>
    </tr>
    <tr>
        <td><label for="phone">Số điện thoại</label></td>
        <td><input type="tel" name="phone_number" value="<?php echo $row['phone_number'] ?>" class="form-control"></input></td>
    </tr>
    <tr>
        <td>Địa chỉ</td>
        <td><input type="text" name="address" value="<?php echo $row['address'] ?>" class="form-control"></input></td>
    </tr>
    <tr>
        <td>Quyền</td>
        <td><input type="text" name="role" value="<?php echo $row['role'] ?>" class="form-control"></input></td>
    </tr>
    <tr>
                        <td><input type="submit" name="update" value="Lưu" class="btn btn-primary"></td>
                        <td><input type="submit" name="return" value="Hủy việc chỉnh sửa" class="btn btn-secondary"></td>
                    </tr>
                <?php } ?>
            </form>
        </table>
    </div>
<?php
if (isset($_POST['update']))
{
$full_name= $_POST['full_name'];
$phone_number=$_POST['phone_number'];
$address=$_POST['address'];
$password=$_POST['password'];
date_default_timezone_set('Asia/Ho_Chi_Minh');
$update_time = date("Y-m-d H:i:s");
$sql_update = " UPDATE `user` SET `full_name`='$full_name',`phone_number`='$phone_number',`address`='$address',update_time='$update_time' WHERE user_id=$user_id ";
mysqli_query($mysqli,$sql_update);
header('Location:../modules/index.php?action=quanlytaikhoan&query=none');
}
else if (isset($_POST['return'])) header('Location:../modules/index.php?action=quanlytaikhoan&query=none');
?>


<?php
include("config.php");
$user_id = $_GET['user_id'];
$role_id = $_GET['role_id'];
$sql_select = " SELECT * from user,role where user.role_id=role.role_id and user.user_id=$user_id limit 1 ";
$sql = mysqli_query($mysqli,$sql_select);
$sql_role="SELECT * FROM role EXCEPT SELECT * FROM role WHERE role_id=$role_id";
$result=mysqli_query($mysqli, $sql_role);
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
        <td><input type="text" name="email" value="<?php echo $row['email']?>" class="form-control"></td>
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
                    <td>
                        <select name="selectOption" id="selectOption">
                            <option value=""><?php echo $row['name']?></option>
                            <?php while($row_1=mysqli_fetch_array($result)):; ?>
                            <option value="<?php echo $row_1['role_id']; ?>"><?php echo $row_1['name'];?></option>
                            <?php endwhile;?>
                        </select>
                    </td>
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
$email=$_POST['email'];
$phone_number=$_POST['phone_number'];
$address=$_POST['address'];
date_default_timezone_set('Asia/Ho_Chi_Minh');
$update_at = date("Y-m-d H:i:s");
$selectedOption = isset($_POST['selectOption']) && $_POST['selectOption'] !== "" ? $_POST['selectOption'] : null;

    // Build the update query dynamically based on whether 'selectOption' is set
    if ($selectedOption !== null) {
        $sql_update = "UPDATE `user` SET `email`='$email', `full_name`='$full_name', `phone_number`='$phone_number', `address`='$address', update_at='$update_at', `role_id`='$selectedOption' WHERE user_id=$user_id";
    } else {
        $sql_update = "UPDATE `user` SET `email`='$email', `full_name`='$full_name', `phone_number`='$phone_number', `address`='$address', update_at='$update_at' WHERE user_id=$user_id";
    }
// $sql_update = " UPDATE `user` SET `email`='$email',`full_name`='$full_name',`phone_number`='$phone_number',`address`='$address',update_at='$update_at', `role_id`='$selectedOption' WHERE user_id=$user_id ";
mysqli_query($mysqli,$sql_update);
echo '<script>location.replace("../modules/index.php?action=quanlytaikhoan&query=none");</script>';
}
else if (isset($_POST['return'])) echo '<script>location.replace("../modules/index.php?action=quanlytaikhoan&query=none");</script>';
?>


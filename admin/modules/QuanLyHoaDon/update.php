<?php
include("config.php");
$order_id = $_GET['order_id'];
$user_id = $_GET['user_id'];
$sql_select = "SELECT * FROM `order` WHERE order_id=$order_id limit 1";
$sql = mysqli_query($mysqli, $sql_select);

$sql_category = "SELECT * FROM `user`";
$result = mysqli_query($mysqli, $sql_category);
?>

<div class="container">
    <h2 class="text-center">Chỉnh sửa hoá đơn</h2>
    <table class="table table-bordered" align="center">
        <form method="POST" enctype="multipart/form-data">
            <?php while ($row = mysqli_fetch_array($sql)) { ?>
                <tr>
                    <td>Nhập tên khách hàng</td>
                    <td> <select name="name" class="form-select" aria-label="Default select example">
                            <?php while ($row_2 = mysqli_fetch_array($result)) { ?>
                                <option value="<?php echo $row_2['user_id'] ?>" name="name" <?php if ($row_2['user_id'] == $user_id) echo "selected" ?>> <?php echo $row_2['full_name'] ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Nhập thành phố</td>
                    <td><input type="text" name="city" value="<?php echo $row['city'] ?>" class="form-control"></td>
                </tr>
                <tr>
                    <td>Nhập quận</td>
                    <td><input type="text" name="district" value="<?php echo $row['district'] ?>" class="form-control"></td>
                </tr>
                <tr>
                    <td>Nhập phường</td>
                    <td><input type="text" name="ward" value="<?php echo $row['ward'] ?>" class="form-control"></td>
                </tr>
                <tr>
                    <td>Nhập ghi chú</td>
                    <td><textarea name="note"><?php echo $row['note'] ?></textarea></td>
                </tr>
                <tr>
                    <td>Nhập giá giao hàng</td>
                    <td><input type="text" name="delivery_money" value="<?php echo $row['delivery_money'] ?>" class="form-control"></td>
                </tr>
                <tr>
                    <td>Nhập giảm giá</td>
                    <td><input type="text" name="discount" value="<?php echo $row['coupon_id'] ?>" class="form-control"></td>
                </tr>
                <tr>
                    <td>Nhập trạng thái</td>
                    <td><input type="text" name="status" value="<?php echo $row['status'] ?>" class="form-control"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="update" value="Sửa sản phẩm" class="btn btn-primary"></td>
                    <td><input type="submit" name="return" value="Hủy việc chỉnh sửa" class="btn btn-secondary"></td>
                </tr>
            <?php } ?>
        </form>
    </table>
</div>
<?php
if (isset($_POST['update'])) {
    $user_id = $_POST['name'];
    $city = $_POST['city'];
    $district = $_POST['district'];
    $ward = $_POST['ward'];
    $note = $_POST['note'];
    $delivery_money = $_POST['delivery_money'];
    $discount = $_POST['discount'];
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $order_date = date("Y-m-d H:i:s");
    $status = $_POST['status'];
    $sql_update = " UPDATE `order` SET `user_id`='$user_id',`city`='$city',`district`='$district',`ward`='$ward',`note`='$note',`delivery_money`='$delivery_money' ,`coupon_id`='$discount', `order_date` ='$order_date', `status`='$status' WHERE order_id=$order_id ";
    mysqli_query($mysqli, $sql_update);
    echo '<script>location.replace("../modules/index.php?action=quanlyhoadon&query=none");</script>';
} else if (isset($_POST['return'])) echo '<script>location.replace("../modules/index.php?action=quanlyhoadon&query=none");</script>';
?>